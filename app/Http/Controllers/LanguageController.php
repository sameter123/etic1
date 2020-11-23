<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LanguageController extends Controller
{
    public function diller()
    {
        return view('back.diller')->with('lang', 'tr');
    }

    public function diller_post(Request $request)
    {
        if(isset($request->sil) and $request->sil == 1) {
            $path_new = "resources/lang/".$request->lang;
            if(file_exists($path_new)) {
                $objects = scandir($path_new);
                foreach ($objects as $object)
                {
                    if ($object != '.' && $object != '..')
                    {
                        if (filetype($path_new.'/'.$object) == 'dir') {
                            rrmdir($path_new.'/'.$object);
                        } else {
                            unlink($path_new.'/'.$object);
                        }
                    }
                }
                reset($objects);
                rmdir($path_new);
                DB::table('langs')->where('id', $request->id)->update([
                    'deleted_at' => date('YmdHis'),
                ]);
                return 1;
                die();
            } else {
                return 0;
            }

        }
        if(isset($request->ekle) and $request->ekle == 1) {
            $path = "resources/lang/".$request->copyLang;
            $path_new = "resources/lang/".$request->lang;
            if(file_exists($path)) { //eğer klasör varsa
                if(!file_exists($path_new)) {
                    mkdir($path_new, '0777', '');
                    copy($path.'/admin.php', $path_new.'/admin.php');
                    $langName = DB::table('languages')->where('iso_639_1', $request->lang)->first()->name;
                    DB::table('langs')->insert([
                       'lang' => $request->lang,
                        'langName' => $langName,
                        'updated_at' => date('YmdHis'),
                        'created_at' => date('YmdHis'),
                    ]);
                    return back()->with('success', 'Dil başarıyla oluşturuldu');
                }
            }
            return back()->with('errors', 'Kopyalanacak dil bulunamadı veya dil zaten var!');
        }
    }
}
