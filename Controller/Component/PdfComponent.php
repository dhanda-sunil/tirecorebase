<?php 

/**
 * Class PdfComponent
 * @tutorial http://madalgo.au.dk/~jakobt/wkhtmltoxdoc/wkhtmltopdf-0.9.9-doc.html
 * @tutorial man wkhtmltopdf
 */
class PdfComponent extends Component{
    
    public $wkhtmltopdf = 'wkhtmltopdf-amd64 -B 5 -L 6 -R 0 -T 10';
    
/**
 * outputs base64 encoded pdf string
 * @param string $name
 * @param array $data
 * @return string
 */
    function outputBase64($name,$data){
        $this->Pdf = ClassRegistry::init('Pdf');
        $r = $this->Pdf->find('first',array('conditions'=>array('name'=>$name,'type'=>$data['Pdf']['type'])));
        $data['Pdf'] = $r['Pdf'];

        if($r){
            $html = $this->requestAction('/pdfs/view/', array('named'=>$data));
            return base64_encode(shell_exec("echo '$html' | $this->wkhtmltopdf - - "));
        }
    }
    
/**
 * outputs html string
 * @param string $name
 * @param array $data
 * @return string
 */    
    function outputHtml($name,$data){
        $this->Pdf = ClassRegistry::init('Pdf');
        $r = $this->Pdf->find('first',array('conditions'=>array('name'=>$name,'type'=>$data['Pdf']['type'])));
        $data['Pdf'] = $r['Pdf'];
        //echo '<pre>'; print_r($data['CoItem']['Co']['CoItem']); echo '</pre>'; die;
        if($r){
            $html = $this->requestAction(array('controller'=>'pdfs','action'=>'view'), array('pass'=>$data));
            echo $html;
        }
    }
    
/**
 * outputs raw pdf string
 * @param string $name
 * @param array $data
 * @return string
 */    
    function outputRaw($name,$data){
        $this->Pdf = ClassRegistry::init('Pdf');
        $r = $this->Pdf->find('first',array('name'=>$name,'type'=>$data['Pdf']['type']));
        $data['Pdf'] = $r['Pdf'];
        if($r){
            $html = $this->requestAction(array('controller'=>'pdfs','action'=>'view'), array('pass'=>$data));
            return shell_exec("echo '$html' | $this->wkhtmltopdf - - ");
        }
    }
    
/**
 * creates pdf file and returns path to file
 * @param string $name
 * @param array $data
 * @return string
 */
    function outputFile($name,$data){
        $this->Pdf = ClassRegistry::init('Pdf');
        $r = $this->Pdf->find('first',array('name'=>$name,'type'=>$data['Pdf']['type']));
        $data['Pdf'] = $r['Pdf'];
        if($r){
            $file = TMP.$name.'.pdf';
            $html = $this->requestAction(array('controller'=>'pdfs','action'=>'view'), array('pass'=>$data));
            shell_exec("echo '$html' | $this->wkhtmltopdf - ".$file);
            return $file;
        }
    }
    
/**
 * creates pdf file and returns path to file
 * @param string $name
 * @param array $data
 * @return string
 */
    function outputFileFromHtml($html){
        $file = TMP.md5($html).'.pdf';
        shell_exec("echo '$html' | wkhtmltopdf - ".$file);
        return $file;
    }
}
?>