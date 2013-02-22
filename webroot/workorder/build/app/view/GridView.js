/*!
 *
 * WorkOrder Application
 * Copyright 2012 TCS
 *
 * @package       WorkOrder
 * @copyright     Copyright 2012 TCS
 * @author        Roland Schuetz <mail@rolandschuetz.at>
 * @author        Chris Nizzardini <cnizzardini@gmail.com>
 * @author        Jeff Wooden <jeff@morointeractive.com>
 */
/*jslint browser: true, vars: true, plusplus: true, white: true, sloppy: true */
/*jshint bitwise:true, curly:true, eqeqeq:true, forin:true, immed:true, latedef:true, newcap:true, noarg:true, noempty:true, regexp:true, undef:true, trailing:false, strict:false */
/*global Ext:false, jQuery:false, Bancha:false, ShopFloor:true, localActions:false, window:false */

Ext.define('WorkOrder.view.GridView', {
    extend: 'Ext.ux.touch.grid.List',
    alias: 'widget.touchgridpanel',

    requires: [
        'Ext.ux.touch.grid.feature.Sorter',
        'Ext.ux.touch.grid.feature.EntryMaxWarning',
        'Ext.ux.touch.grid.feature.Editable2'
    ],

    config: {
        /**
         * @config {String} highlight
         * If the column is defined with highlight, the default renderer will use these
         * space separated search strings to highlight in the fields.
         * See {@link _buildTpl} line 101
         */
        highlight: '',
        store: 'Customers',
        features: [
            {
                ftype: 'Ext.ux.touch.grid.feature.Sorter',
                launchFn: 'initialize'
            },
            {
                ftype: 'Ext.ux.touch.grid.feature.EntryMaxWarning',
                launchFn: 'constructor'
            }
        ]
    },

    /**
     * overwrite the default _buildTpl to add the highlight renderer
     */
    _buildTpl: function(columns, header) {
        var me         = this,
            tpl        = [],
            c          = 0,
            cNum       = columns.length,
            basePrefix = Ext.baseCSSPrefix,
            renderers  = {},
            defaults   = me.getDefaults() || {},
            rowCls     = me.getRowCls(),
            column, hidden, css, styles, attributes, width, renderer, rendererName, innerText;

        for (; c < cNum; c++) {
            column = columns[c];
            hidden = column.hidden;

            if (hidden) {
                continue;
            }

            css           = [basePrefix + 'grid-cell'];
            styles        = [];
            attributes    = ['dataindex="' + column.dataIndex + '"'];
            width         = column.width || defaults.column_width;
            renderer      = column[header ? 'headerRenderer' : 'renderer'] || this._defaultRenderer;
            rendererName  = column.dataIndex + '_renderer';

            // add support for highlighting of matches
            if(column.highlight) {
                /*jshint loopfunc:true */
                renderer = (function(renderer, grid) { //scope the renderer for each column
                    return function() {
                        var originalResult = renderer.apply(this,arguments); // first call the default renderer
                        return grid._highlightRenderer(grid,originalResult); // and then highlight hte result
                    };
                }(renderer, this));
                /*jshint loopfunc:false */
            }
            
            if (header) {
                css.push(basePrefix + 'grid-cell-hd');
                innerText = renderer.call(this, column.header);
            } else {
                innerText = '{[this.' + rendererName + '(values.' + column.dataIndex + ', values)]}';

                if (column.style) {
                    styles.push(column.style);
                }

                renderers[rendererName] = renderer;
            }

            if (column.cls) {
                css.push(column.cls);
            }

            if (width) {
                styles.push('width: ' + width + (Ext.isString(width) ? '' : 'px') + ';');
            }

            if (styles.length > 0) {
                attributes.push('style="' + styles.join(' ') + '"');
            }

            tpl.push('<div class="' + css.join(' ') + '" ' + attributes.join(' ') + '>' + innerText + '</div>');
        }

        tpl = tpl.join('');

        if (!header && (Ext.isFunction(rowCls) || Ext.isString(rowCls))) {
            renderers._getRowCls = Ext.bind(me.getRowCls, me);
            tpl = '<div class="' + basePrefix + 'grid-row {[this._getRowCls(values) || \'\']}">' + tpl + '</div>';
        }

        return {
            tpl       : tpl,
            renderers : renderers
        };
    },


    /**
     * a simple highlight renderer
     */
    _highlightRenderer: function(grid, value) {
        var regexps = grid._getRegexps(grid.getHighlight());
        
        //loop them all
        Ext.each(regexps, function(regex) {
            value = value.replace(regex, '<span class="highlight-filter-match">$1</span>');
        });
        
        return value;
    },
    
    /**
     * Returns the valid search regexes (cached)
     */
    _getRegexps: function(search) {
        // check cache
        if(this.cache && this.cache.searchRegex[search]) {
            return this.cache.searchRegex[search];
        }
        
        // parse regexes
        
        //the user could have entered spaces, so we must split them so we can loop through them all
        var searches = search.split(' '),
            regexps = [],
            i, len;

        //loop them all
        for (i = 0, len = searches.length; i < len; i++) {
            //if are less then 3 chars and it's nto a number, continue
            if(!Ext.isNumeric(searches[i]) && searches[i].length<3) { continue; }
        
            // found a search str, create a new regular expression which is case insenstive
            // parenthesis around the string are needed to make it replacable in with str.replace
            // greedy is needed to replace all usage
            regexps.push(new RegExp('('+searches[i]+')', 'ig')); 
        }
        
        // cache them
        this.cache = this.cache || {};
        this.cache.searchRegex = this.cache.searchRegex || {};
        this.cache.searchRegex[search] = regexps;
        
        // return regex
        return regexps;
    }

});