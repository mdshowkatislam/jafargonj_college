<?php

namespace App\Services;

use App\Models\CpcSection;
use App\Models\Faq;
use Illuminate\Http\Request;

/**
 * Class FaqServices
 * @package App\Services
 */
class FaqServices
{
    public function getAllFaq()
    {
        $data = Faq::where('status', 1)->latest()->get();
        return $data;
    }

    public function faqByType($faq_type)
    {
        $data = Faq::where('faq_type', $faq_type)->latest()->where('status', 1)->get();
        return $data;
    }

    public function faqByTypeAndRefId($faq_type, $ref_id=null)
    {
        $data = Faq::where('faq_type', $faq_type)->where('ref_id', $ref_id)->where('status', 1)->latest()->get();
        return $data;
    }



}
