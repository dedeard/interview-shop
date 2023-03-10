<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ProofHelper extends Helper
{

    /**
     * define constant variable.
     */
    const FORMAT = 'jpg';
    const EXT = '.jpeg';
    const DIR = 'proof/';

    /**
     * Generate image name, upload new image delete old image.
     */
    public static function generate($img, $oldName = null): String
    {
        $name = self::DIR . parent::uniqueName(self::EXT);

        $tmp = Image::make($img)->fit(640, null, function ($c) {
            $c->aspectRatio();
        });
        Storage::put($name, (string) $tmp->encode(self::FORMAT, 80));
        if ($oldName) {
            self::destroy($oldName);
        }
        return $name;
    }

    /**
     * Delete the image.
     */
    public static function destroy($name): void
    {
        if (Storage::exists($name)) {
            Storage::delete($name);
        }
    }

    /**
     * Get the image urls.
     */
    public static function getUrl($name = null): String
    {
        return $name ? Storage::url($name) : '';
    }
}
