<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\Demande;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function isAdmin()
    {
        $user = Auth::user();
        return $user->hasRole('ADMINISTRATION');
    }


    public function IsEtudiant()
    {
        $user = Auth::user();
        return $user->hasRole('ETUDIANT');
    }

   

    public function downloadFilesZip($demandeId)
    {
        $demande = Demande::findOrFail($demandeId);
    
        $zip = new \ZipArchive();
        $zipFileName = 'documents_demande_' . $demande->user->prenom . $demande->user->nom . '.zip';
    
        if ($zip->open($zipFileName, \ZipArchive::CREATE) === true) {
            $documents = json_decode($demande->documents, true);
            $documentsTitle = json_decode($demande->documents_title, true);
    
            foreach ($documents as $key => $document) {
                $zip->addFromString($documentsTitle[$key], base64_decode($document));
            }
    
            $zip->close();
    
            // Set headers for force download
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="' . $zipFileName . '"');
            header('Content-Length: ' . filesize($zipFileName));
            header('Pragma: public');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Expires: 0');
            readfile($zipFileName);
    
            // Delete the temporary zip file after download
            unlink($zipFileName);
            exit;
        } else {
            return redirect()->back()->with('error', 'Erreur lors de la création du fichier ZIP.');
        }
    }
    
}
