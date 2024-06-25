<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoragesHelpers
{
    static function create($file)
    {

        try {
            // Générer le nom de fichier unique
            $fileName = time() . '_' . rand(1, 21) . '.' . $file->extension();

            // Définir le chemin du dossier de stockage
            $file_path = 'uploads/files/';

            // Stocker le fichier
            $file->storeAs($file_path, $fileName, 'public');

            // Construire l'URL de l'image
            $url = env('APP_URL') ?: "http://localhost:8000";
            $file_url = $url . '/storage/' . $file_path . '/' . $fileName;

            // Vérifier si le fichier existe
            if (Storage::disk('public')->exists($file_path . '/' . $fileName)) {
                // Fichier enregistré avec succès
                return [
                    'message' => 'Fichier enregistré avec succès',
                    'response' => (object)[
                        "path" => $file_url
                    ],
                    'error' => false,
                    'status' => true
                ];
            } else {
                // Échec de l'enregistrement du fichier
                return [
                    'message' => 'Échec de l\'enregistrement du fichier',
                    'error' => true,
                    'status' => false,
                    'response' => false
                ];
            }
        } catch (\Throwable $th) {
            // Gérer les exceptions
            return [
                'error' => $th->getMessage(),
                'status' => false
            ];
        }
    }

    public function update($Newfile, $oldUrl)
    {
        $oldFilePath = parse_url($oldUrl, PHP_URL_PATH);

        if (Storage::disk('public')->exists($oldFilePath)) {
            Storage::disk('public')->delete($oldFilePath);


            // Télécharger le nouveau fichier
            Storage::disk('public')->put($oldFilePath, file_get_contents($Newfile));
            echo "Le nouveau fichier a été téléchargé avec succès.";
        } else {
            echo "L'ancien fichier n'existe pas.";
        }
    }

    static  public function delete($filePath)
    {
        try {

            if (Storage::disk('public')->exists($filePath)) {

                Storage::disk('public')->delete($filePath);
                return [
                    'error' => false,
                    'status' => true
                ];
            } else {

                return [
                    'error' => true,
                    'data' => $filePath,
                ];
            }
        } catch (\Throwable $th) {
            //throw $th;
            return [
                'error' => $th->getMessage(),
                'status' => false
            ];
        }
    }
}
