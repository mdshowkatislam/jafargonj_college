<?php

namespace App\Services;

use App\Models\GalleryCategory;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Services\IService;

/**
 * Class GalleryService
 * @package App\Services
 */
class GalleryService
{

        public function getGalleryCategoryByCategoryAndRefId($id, $ref_id)
        {
                $data = GalleryCategory::where('sub_category', $id)
                        ->where('ref_id', $ref_id)
                        ->where('status', 1)
                        ->latest()
                        ->get();
                return $data;
        }
        public function getGalleryCategoryByCategory($id)
        {
                $data = GalleryCategory::where('sub_category', $id)
                        ->where('status', 1)
                        ->latest()
                        ->get();
                return $data;
        }

        public function getGalleryCategoryNameById($id)
        {
                $data = GalleryCategory::findOrFail($id);
                return $data;
        }

        public function getGalleryByCategory($id)
        {
                $data = Gallery::where('gallery_category_id', $id)
                        ->where('status', 1)
                        ->get();
                return $data;
        }

     
}
