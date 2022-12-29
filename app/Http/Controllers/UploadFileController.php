<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadFileController extends Controller
{
    public function index()
    {
        return view('xml_validate');
    }
    public function showUploadFile(Request $request)
    {
        $xmlReader = new \XMLReader();
        $xmlReader->open($request->file->path());
        $xmlReader->setParserProperty(\XMLReader::VALIDATE, true);
        $xmlReader->setSchema('./schema/pain.001.001.03.xsd');

        \libxml_use_internal_errors(true);

        $msgs = [];

        while ($xmlReader->read()) {            
            if (!$xmlReader->isValid()) {
                $err = \libxml_get_last_error();
                if ($err && $err instanceof \libXMLError) {
                    $msg = \trim($err->message) . ' on line ' . $err->line;
                    $msgs[] = $msg;
                    if (str_contains(\trim($err->message),"InstdAmt")){
                        $regex = '/: \'([^\']*)\' is not a valid value/';
                        if (preg_match($regex, $err->message, $matches)) {
                            $old = $matches[1];
                        }
                        $new = str_replace(",", ".", $old);
                        $new = str_replace("-", ".", $old);
                        
                        //dd($new);
                        $line = $this->edit($request->file->path(),$err->line,$old,$new);
                        return view('xml_response', compact('msgs','line'));
                    }
                   
                }
            }
        }
        //print("Everything look good the problem is somewhere else");
        //dd($request->file->get());
        $payments = new \SimpleXMLElement($request->file->path(),null,true);
        $payments = $payments->CstmrCdtTrfInitn->PmtInf;
        $file_info = $payments->CstmrCdtTrfInitn->GrpHdr;
        //dd($payments);
        return view('xml_response', compact('msgs','payments'));
    }
    public function edit($file,$line,$old,$new) {
        $library = new \SimpleXMLElement($file,null,true);
        $id = 0;
        foreach($library->CstmrCdtTrfInitn->PmtInf->CdtTrfTxInf as $x){
            if ($x->Amt->InstdAmt==$old){
                break;
            }
            $id++;
        }
        $library->CstmrCdtTrfInitn->PmtInf->CdtTrfTxInf[$id]->Amt->InstdAmt = $new;
        //dd($library->CstmrCdtTrfInitn->PmtInf->CdtTrfTxInf[$id]->Amt->InstdAmt);
        $library->asXML('right.xml');
        return $library->CstmrCdtTrfInitn->PmtInf->CdtTrfTxInf[$id];
    }
}
