(function () {
    $('.hideHeader').on('click', function (evt) {
        $(this).parent().siblings('div').toggle('slow');
    });

    // Get customer limited fields and disable them until a customer is selected
    var customerLimited = $('.customerLimited');
    customerLimited.attr('disbled', 'disabled');

    $('#customer_id').on('change', function (evt) {
        var customer = $(this).val();
        console.log(customer);
        if (customer === '') {
            customerLimited.attr('disabled', 'disabled');
            customerLimited.each(function (obj) {
                $(this).find('option').remove();
            });
        } else {
            customerLimited.removeAttr('disabled');
            $.get('/customers/loadRelationships/' + customer + '.json', {}, function (data) {
                if (data) {
                    console.log(data.customer);
                    var accounts = data.customer.Account;
                    var contacts = data.customer.Contact;
                    var addresses = data.customer.Address;
                    $('#account_id').append("<option value=''>Choose your account</div>");
                    $.each(accounts, function (key, obj) {
                        $('#account_id').append("<option value=''>" + obj.number + "</option>");
                    });
                    $('#requester_id').append("<option value=''>Choose the requester</div>");
                    $.each(contacts, function (key, obj) {
                        $('#requester_id').append("<option value=''>" + obj.first_name + " " + obj.last_name + "</option>");
                    });
                    $('#bill_address_id').append("<option value=''>Choose the billing address</div>");
                    $.each(addresses, function (key, obj) {
                        $('#bill_address_id').append("<option value=''>" + obj.name + "</option>");
                    });
                    $('#ship_address_id').append("<option value=''>Choose the shipping address</div>");
                    $.each(addresses, function (key, obj) {
                        $('#ship_address_id').append("<option value=''>" + obj.name + "</option>");
                    });
                }
            })
        }
    });

    // Insert new line
    $('.newItem').on('click', function(evt) {
        $(this).before(itemTpl);
        renumberLines();
    });

    // Delete Line
    $('table').on('click', '.deleteRow', function(evt) {
        var row = $(this).parent().parent();
        row.addClass('error');
        $('#deleteRowCheck').on('hide', function (evt) {
            row.removeClass('error');
            $('#deleteOK').off('click');
        }).modal();
        $('#deleteOK').on('click', function (evt) {
            row.hide('slow', function() {
                $(this).remove();
                renumberLines();
            });

        });
    });

    // Copy Line
    $('table').on('click', '.copyRow', function(evt) {
        var row=$(this).parent().parent();
        row.addClass('info');
        $('.newItem').trigger('click');
        var newRow=$('.newItem').prev();
        newRow.addClass('warning');
        var oldFields=row.find('td');
        var newFields=newRow.find('td');
        newFields.eq(2).find('select').val(oldFields.eq(2).find('select').val());
        newFields.eq(6).find('select').val(oldFields.eq(6).find('select').val());
        newFields.eq(3).find('input').val(oldFields.eq(3).find('input').val());
        row.delay(1000).removeClass('info', 2000);
        newRow.delay(1000).removeClass('warning', 2000);

    });

    function renumberLines() {
        $('table tbody tr:not(.newItem)').each(function (idx, el) {
            $('td:first span', this).text(idx+1);
        });
    }



    var dataToSave = {};
// Load this list into the form.
    $('#Customer').autocomplete({
        source:customerList,
        minLength:2,
        select:function (event, ui) {
            event.preventDefault();
            this.value = ui.item.label;
            dataToSave.customer_id = ui.item.value;
        },
        change:function (event, ui) {
            if (!ui.item) {
                this.value = "";
                dataToSave.customer_id = null;
            } else {
                dataToSave.customer_id = ui.item.value;
            }

        }
    });

    $('#Requester').autocomplete({
        source:getRequesters,
        minLength:2,
        select:function (event, ui) {
            event.preventDefault();
            this.value = ui.item.label;
            dataToSave.requester_id = ui.item.value;
            console.log(dataToSave);
        },
        change:function (event, ui) {
            if (!ui.item) {
                this.value = "";
                dataToSave.requester_id = null;
            } else {
                dataToSave.requester_id = ui.item.value;
            }
        }

    });

    function getRequesters(request, response) {
        $.get("/contacts/search/" + dataToSave.customer_id + ".json", request, function (data) {
            var results = [];

            if (data.results)
                response(data.results);
            else
                response([]);
        });
    }


})();