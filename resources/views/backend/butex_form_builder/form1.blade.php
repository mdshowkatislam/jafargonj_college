<style>
    .border_custom{
        border-bottom: 2px dotted #000;
    }
    .font-16{
        font-size: 16px;
    }
    .font-17{
        font-size: 17px;
    }
    .font-18{
        font-size: 18px;
    }
    .font-19{
        font-size: 19px;
    }
    .font-20{
        font-size: 20px;
    }
</style>


<div class="container-fluid bn">
    <div class="row">
        <div class="col-sm-3">
            <div class="text-center">
                <img src="{{ asset('/logo.png') }}" style="width: 150px; height: 150px;" alt="">
            </div>
        </div>
        <div class="col-sm-6">
            <h2 class="text-center">বাংলাদেশ টেক্সটাইল বিশ্ববিদ্যালয়</h2>
            <h4 class="text-center">তেজগাঁও, ঢাকা-১২০৮।</h4>
            <h3 class="text-center">প্রবেশ পত্র</h3>
        </div>
        <div class="col-sm-3">
            <div class="text-center">
                <img src="{{ asset('/uploads/' . $data->data59) }}" style="width: 180px; height: 180px;" alt="">
            </div>
        </div>
    </div>

    <?php
    // Assuming $data->data56 contains the number, e.g., "1234567890"
    $data56 = isset($data->data56) ? $data->data56 : '';

    // Split the data56 value into an array of individual digits or parts
    $data56Parts = str_split($data56);
    ?>

    <table class="bn" style="width: 500px;">
        <tr>
            <td style="width: 150px; font-size: 17px;">স্টুডেন্ট আইডিঃ</td>
            <?php
            // Dynamically generate <td> elements for each part of data56
            foreach ($data56Parts as $part) {
                echo "<td style='text-align: center; font-size: 17px;'>$part</td>";
            }
            ?>
        </tr>
    </table>


    <p class="bn mt-3 font-18" style="font-weight: 600">বিএসসি ইন টেক্সটাইল ইঞ্জিনিয়ারিং প্রোগ্রাম লেভেলঃ <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data57 }} &nbsp; &nbsp; &nbsp;</span> টার্মঃ <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data61 }} &nbsp; &nbsp; &nbsp;</span> পরীক্ষাঃ <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data62 }} &nbsp; &nbsp; &nbsp;</span></p>

    <p class="bn mt-3 font-18" style="text-align: justify; font-weight: 600">
        বিভাগঃ {{ @$data->data63 }}
    </p>

    <h4 class="text-center" style="font-weight: 600">Regular/Repeat/Improvement/Supplementary</h4>
    <div class="p-1 font-18">পরীক্ষার্থীর পূর্ণ নাম (বাংলায়): <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data1 }} &nbsp; &nbsp; &nbsp;</span> </div>
    <div class="p-1 font-18">(এসএসসি/সমমান পরীক্ষার সার্টিফিকেট অনুযায়ী)</div>
    <div class="p-1 font-18">পরীক্ষার্থীর পূর্ণ নাম (ইংরেজী বড় অক্ষরে): <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data2 }} &nbsp; &nbsp; &nbsp;</span></div>
    <div class="p-1 font-18">(এসএসসি/সমমান পরীক্ষার সার্টিফিকেট অনুযায়ী)</div>

    <div class="p-1 mt-2 font-18">পিতার নামঃ <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data3 }} &nbsp; &nbsp; &nbsp;</span></div>
    <div class="p-1 font-18">মাতার নামঃ <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data4 }} &nbsp; &nbsp; &nbsp;</span></div>

    <h5 class="p-1 bn mt-2 font-18" style="font-weight: 600">পরীক্ষায় অবতীর্ণ হওয়ার বিষয় কোড ও বিষয় (কোন কাটাকাটি বা ঘষামাজা করা যাবে না)</h5>

    <table class="bn font-18" style="font-weight: 600">
        <tr>
            <th class="text-center">ক্রম</th>
            <th class="text-center">বিষয় কোড</th>
            <th class="text-center">বিষয়ের নাম</th>
            <th class="text-center">ক্রম</th>
            <th class="text-center">বিষয় কোড</th>
            <th class="text-center">বিষয়ের নাম</th>
        </tr>
        <tr>
            <td class="text-center">১.</td>
            <td class="text-center">{{ @$data->data28 }}</td>
            <td class="text-center">{{ @$data->data29 }}</td>
            <td class="text-center">৮.</td>
            <td class="text-center">{{ @$data->data30 }}</td>
            <td class="text-center">{{ @$data->data31 }}</td>
        </tr>
        <tr>
            <td class="text-center">২.</td>
            <td class="text-center">{{ @$data->data32 }}</td>
            <td class="text-center">{{ @$data->data33 }}</td>
            <td class="text-center">৯.</td>
            <td class="text-center">{{ @$data->data34 }}</td>
            <td class="text-center">{{ @$data->data35 }}</td>
        </tr>
        <tr>
            <td class="text-center">৩.</td>
            <td class="text-center">{{ @$data->data36 }}</td>
            <td class="text-center">{{ @$data->data37 }}</td>
            <td class="text-center">১০.</td>
            <td class="text-center">{{ @$data->data38 }}</td>
            <td class="text-center">{{ @$data->data39 }}</td>
        </tr>
        <tr>
            <td class="text-center">৪.</td>
            <td class="text-center">{{ @$data->data40 }}</td>
            <td class="text-center">{{ @$data->data41 }}</td>
            <td class="text-center">১১.</td>
            <td class="text-center">{{ @$data->data42 }}</td>
            <td class="text-center">{{ @$data->data43 }}</td>
        </tr>
        <tr>
            <td class="text-center">৫.</td>
            <td class="text-center">{{ @$data->data44 }}</td>
            <td class="text-center">{{ @$data->data45 }}</td>
            <td class="text-center">১২.</td>
            <td class="text-center">{{ @$data->data46 }}</td>
            <td class="text-center">{{ @$data->data47 }}</td>
        </tr>
        <tr>
            <td class="text-center">৬.</td>
            <td class="text-center">{{ @$data->data48 }}</td>
            <td class="text-center">{{ @$data->data49 }}</td>
            <td class="text-center">১৩.</td>
            <td class="text-center">{{ @$data->data50 }}</td>
            <td class="text-center">{{ @$data->data51 }}</td>
        </tr>
        <tr>
            <td class="text-center">৭.</td>
            <td class="text-center">{{ @$data->data52 }}</td>
            <td class="text-center">{{ @$data->data53 }}</td>
            <td class="text-center">১৪.</td>
            <td class="text-center">{{ @$data->data54 }}</td>
            <td class="text-center">{{ @$data->data55 }}</td>
        </tr>

    </table>

    <div class="row mt-3">
        <div class="col-sm-8">
            <img src="{{ asset('/uploads/' . $data->data60) }}" style="width: 200px; height: 80px;" alt=""><br>
            <span class="border_custom">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ @$data->data58 }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
            <div class="p-1 mt-2 font-18"><b>পরীক্ষার্থীর স্বাক্ষর ও তারিখ:</b></div>
            <div class="p-1 font-18">পরীক্ষা আরম্ভ হওয়ার তারিখ: <span class="border_custom"></span></div>
            <div class="p-1 font-18">(পরীক্ষা নিয়ন্ত্রক অফিস কর্তৃক পূরণীয়)</div>
        </div>
        <div class="col-sm-4">
            <div class="p-1 text-center font-18" style="margin-top: 40px;"><b>পরীক্ষা নিয়ন্ত্রক</b></div>
            <div class="p-1 mt-2 text-center font-18">বাংলাদেশ টেক্সটাইল বিশ্ববিদ্যালয়</div>
        </div>
    </div>

    <div class="mt-2">
        <div class="font-18">বিঃ দ্রঃ</div>
        <div class="p-1 font-18">১। পরীক্ষার্থীকে নিজ হাতে ফরমটি পূরণ করতে হবে।</div>
        <div class="p-1 font-18">২। পরীক্ষার্থী কর্তৃক তথ্যাবলী লেখার সময় কোন কাটাকাটি বা ঘষামাজা করা চলবে না।</div>
        <div class="p-1 font-18">৩। পরীক্ষার্থীর ছবি বিভাগীয় প্রধান কর্তৃক সীলমোহরসহ সত্যায়িত হবে। তিনি এরূপ স্বাক্ষর প্রদান করবেন যাতে তার স্বাক্ষরের অর্ধেক অংশ ছবির উপর এবং বাকী অর্ধেক অংশ প্রবেশ পত্রের উপর থাকে।</div>
        <div class="p-1 font-18">৪। রেজিস্ট্রার অফিস কর্তৃক নিরীক্ষাকৃত ফরম চূড়ান্ত বলে বিবেচিত হবে।</div>
        <div class="p-1 font-18">৫। পরীক্ষার্থীর জন্য নির্দেশাবলী অপর পৃষ্ঠায় উল্লেখ করা হ'ল।</div>
    </div>

    <div class="page-break"></div>

    <div class="mt-4">
        <h4 class="text-center font-19 p-2" style="font-weight: 600">পরীক্ষার্থীদের জন্য পালনীয় নির্দেশাবলী</h4>
        <div class="p-2 font-19">১। মোবাইল/টেলিফোন/ইলেকট্রনিক্স রিসিভার নিয়ে পরীক্ষার হলে প্রবেশ করা যাবে না।</div>
        <div class="p-2 font-19">২। বাংলাদেশ টেক্সটাইল বিশ্ববিদ্যালয় হতে ইস্যুকৃত মূল প্রবেশ পত্র ছাড়া পরীক্ষার হলে প্রবেশ করা যাবে না।</div>
        <div class="p-2 font-19">৩। মূল প্রবেশ পত্র, পরিচয় পত্র, কলম, কালি, পেন্সিল, জ্যামিতি বাক্স, হাতঘড়ি এবং যাতায়াতের টাকা-পয়সা ছাড়া অন্য কোন উপকরণ/উপকরণসমূহ সঙ্গে নিয়ে পরীক্ষার হলে প্রবেশ করা যাবে না।</div>
        <div class="p-2 font-19">৪। নোটিশ বোর্ড/রেজিস্ট্রার/পরীক্ষা নিয়ন্ত্রক অফিস-এ যোগাযোগ করে পরীক্ষার সময়সূচী ও স্থান পরীক্ষার্থীকে নিজ দায়িত্বে জেনে নিতে হবে।</div>
        <div class="p-2 font-19">৫। পরীক্ষার হলে দায়িত্ব পালনরত পরিদর্শকের স্বাক্ষরবিহীন উত্তরপত্র গ্রহণযোগ্য নহে।</div>
        <div class="p-2 font-19">৬। পরীক্ষার হলের প্রধান পরিদর্শক কর্তৃক অনুমোদিত ক্যালকুলেটর ছাড়া অন্য কোন প্রকার ক্যালকুলেটর ব্যবহার করা যাবে না।</div>
        <div class="p-2 font-19">৭। পরীক্ষার হলে আইন শৃংখলা ভঙ্গকারী পরীক্ষার্থীর/পরীক্ষার্থীদের বিরুদ্ধে উপযুক্ত আইনানুগ ব্যবস্থা গ্রহণ করা হবে।</div>
        <div class="p-2 font-19">৮। পরীক্ষার হলে দায়িত্ব পালনরত প্রধান পরিদর্শক ও অন্যান্য পরিদর্শকগণ কর্তৃক আরোপিত নির্দেশাবলী যথাযথভাবে পরীক্ষার্থীকে মেনে চলতে হবে।</div>
        <div class="p-2 font-19">৯। পরীক্ষার হলে ধূমপান শাস্তিযোগ্য অপরাধ বিধায় পরীক্ষার হলে ধূমপান সম্পূর্ণরূপে নিষিদ্ধ।</div>
        <div class="p-2 font-18">১০। উত্তরপত্রের কভার পৃষ্ঠায় কিংবা অন্য কোন পৃষ্ঠায় পরীক্ষার্থীর নাম ঠিকানা লেখা যাবে না কিংবা কোন সাংকেতিক চিহ্ন ব্যবহার করা যাবে না।</div>
        <div class="p-2 font-19">১১। উত্তর পত্রের কভার পৃষ্ঠায় মুদ্রিত নির্দেশাবলী পরীক্ষার্থী কর্তৃক যথাযথভাবে পালনীয়।</div>
        <div class="p-2 font-19">১২। পরীক্ষার হলে পরীক্ষা চলাকালীন সময়ে পরস্পর কথা বলা শাস্তিযোগ্য অপরাধ।</div>
    </div>

    <div class="page-break"></div>

    <div class="row">
        <div class="col-sm-3">
            <div class="text-center">
                <img src="{{ asset('/logo.png') }}" style="width: 100px; height: 100px;" alt="">
            </div>
        </div>
        <div class="col-sm-6">
            <h2 class="text-center" style="font-weight: 600">বাংলাদেশ টেক্সটাইল বিশ্ববিদ্যালয়</h2>
            <h4 class="text-center">তেজগাঁও, ঢাকা-১২০৮।</h4>
            <h3 class="text-center" style="font-weight: 600">আবেদন পত্র</h3>
        </div>
        <div class="col-sm-3">
            <div class="text-center">
                <img src="{{ asset('/uploads/' . $data->data59) }}" style="width: 150px; height: 150px;" alt="">
            </div>
        </div>
    </div>

    <table class="bn" style="width: 500px;">
        <tr>
            <td style="width: 150px; font-size: 17px;">স্টুডেন্ট আইডিঃ</td>
            <?php
            // Dynamically generate <td> elements for each part of data56
            foreach ($data56Parts as $part) {
                echo "<td style='text-align: center; font-size: 17px;'>$part</td>";
            }
            ?>
        </tr>
    </table>

    <p class="mt-3 font-18 bn" style="font-weight: 600">বিএসসি ইন টেক্সটাইল ইঞ্জিনিয়ারিং প্রোগ্রাম লেভেলঃ <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data57 }} &nbsp; &nbsp; &nbsp;</span> টার্মঃ <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data61 }} &nbsp; &nbsp; &nbsp;</span> পরীক্ষাঃ <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data62 }} &nbsp; &nbsp; &nbsp;</span></p>

    <p class="mt-3 font-18 bn" style="font-weight: 600">
        বিভাগঃ {{ @$data->data63 }}
    </p>

    <div class="">
        <div class="font-18" style="font-weight: 600">পরীক্ষা নিয়ন্ত্রক</div>
        <div class="font-18">বাংলাদেশ টেক্সটাইল বিশ্ববিদ্যালয়</div>
        <div class="font-18">তেজগাঁও, ঢাকা-১২০৮।</div>
    </div>

    <p class="mt-2 font-19">
        জনাব, <br/>

        বিনীত নিবেদন এই যে, আমি বাংলাদেশ টেক্সটাইল বিশ্ববিদ্যালয়ের আসন্ন বিএসসি ইন টেক্সটাইল ইঞ্জিনিয়ারিং প্রোগ্রাম লেভেল: <span class="border_custom">&nbsp; &nbsp; {{ @$data->data57 }} &nbsp; &nbsp; </span>

        টার্ম: <span class="border_custom">&nbsp; &nbsp; {{ @$data->data61 }} &nbsp; &nbsp; </span> পরীক্ষা: <span class="border_custom">&nbsp; &nbsp; {{ @$data->data62 }} &nbsp; &nbsp; </span> এ Regular/Repeat/Improvement/Supplementary পরীক্ষার্থী হিসেবে অংশগ্রহনের অনুমতি প্রার্থনা করছি। <br/>

        আমি এই মর্মে অঙ্গীকার করছি যে, দরখাস্তের উভয় পৃষ্ঠায় আমার নিজ হাতে লিখিত তথ্যাবলী সত্য এবং আমার পরীক্ষা সংক্রান্ত ব্যাপারে কোন সমস্যা দেখা দিলে আমি সিন্ডিকেটের সিদ্ধান্ত অথবা সিন্ডিকেট দ্বারা ক্ষমতা প্রাপ্ত কর্মকর্তার সিদ্ধান্তকে চূড়ান্ত বলে মেনে নেব।
    </p>

    <div class="row">
        <div class="col-sm-8">
            <div class="mt-3 font-18">তারিখঃ {{ @$data->data58 }}</div>
        </div>
        <div class="col-sm-4">
            <div class="text-center font-18">আপনার একান্ত অনুগত</div><br/>
            <div style="text-align: center;">
                <img src="{{ asset('/uploads/' . $data->data60) }}" style="width: 200px; height: 80px;" alt="">
            </div>
            <div class="text-center font-18">পরীক্ষার্থীর স্বাক্ষর</div>
            <div class="font-18">বর্তমান ঠিকানা: {{ @$data->data5 }}, {{ @$data->data6 }}, {{ @$data->data7 }}, {{ @$data->data8 }}</div>
            <div class="font-18">মোবাইল নং {{ @$data->data64 }}</div>
        </div>
    </div>

    <div class="mt-3">
        <h4 class="text-center" style="font-weight: 600">প্রত্যয়ন পত্র</h4>
        <p class="font-19" style="text-align: justify;">
        উপরোক্ত পরীক্ষার্থী বিএসসি ইন টেক্সটাইল ইঞ্জিনিয়ারিং প্রোগ্রাম লেভেলঃ <span class="border_custom">&nbsp; &nbsp; {{ @$data->data57 }} &nbsp; &nbsp; </span> টার্মঃ <span class="border_custom">&nbsp; &nbsp; {{ @$data->data61 }} &nbsp; &nbsp; </span> শিক্ষাবর্ষ: <span class="border_custom">&nbsp; &nbsp; {{ @$data->data62 }} &nbsp; &nbsp; </span> হয়েছে। ভর্তি হয়েছে।
        </p>
        <p class="font-19" style="text-align: justify;">
        আমি এই মর্মে প্রত্যয়ন করছি যে, উপরোক্ত পরীক্ষার্থী বাংলাদেশ টেক্সটাইল বিশ্ববিদ্যালয়ের বিএসসি ইন টেক্সটাইল ইঞ্জিনিয়ারিং প্রোগ্রামের লেভেলঃ <span class="border_custom">&nbsp; &nbsp; {{ @$data->data57 }} &nbsp; &nbsp; </span> টার্ম: <span class="border_custom">&nbsp; &nbsp; {{ @$data->data61 }} &nbsp; &nbsp; </span> পরীক্ষা- <span class="border_custom">&nbsp; &nbsp; {{ @$data->data62 }} &nbsp; &nbsp; </span> এ Regular/Repeat/Improvement/Supplementary অংশগ্রহনের জন্য বিধি মোতাবেক ক্লাশে উপস্থিতির প্রয়োজনীয় হারসহ তত্ত্বীয়, ব্যবহারিক ক্লাশ, সেশনাল কার্যক্রম, চলমান মূল্যায়ন যথাযথভাবে সম্পন্ন করেছে। তার নৈতিক চরিত্রের বিরুদ্ধে আমার কিছু জানা নাই। সে সমাজ বা রাষ্ট্রবিরোধী কোন কাজে জড়িত নহে। আমার জানামতে উল্লেখিত তথ্যাদি সত্য। তার কার্যাদি সন্তোষজনক হওয়ায় সে অত্র পরীক্ষায় অংশগ্রহণের জন্য উপযুক্ত বলে তাকে পরীক্ষায় অংশগ্রহনের অনুমতি প্রদানের জন্য সুপারিশ করছি। 
        </p>

        <p class="font-19" style="text-align: justify;">
        আলোচ্য পরীক্ষার্থী বিএসসি ইন টেক্সটাইল ইঞ্জিনিয়ারিং প্রোগ্রাম লেভেল: টার্ম চূড়ান্ত পরীক্ষা <span class="border_custom">&nbsp; &nbsp; {{ @$data->data62 }} &nbsp; &nbsp; </span> এ উত্তীর্ণ হয়েছে।
        </p>
    </div>

    <br/>

    <div class="row">
        <div class="col-sm-8"></div>
        <div class="col-sm-4">
            <div class="">..................................................................</div>
            <p class="font-18">বিভাগীয় প্রধানের স্বাক্ষর, সীল ও তারিখ</p>
        </div>
    </div>

    <div class="">
        <div class="font-18" style="font-weight: 600">বিঃ দ্রঃ </div>
        <div class="p-2 font-18">১। প্রত্যেক পরীক্ষার্থীকে নিজ হাতে ফরমটি পূরণ করতে হবে এবং যথাযথ কর্তৃপক্ষ কর্তৃক প্রত্যয়ন করতে হবে। অন্যথায় ফরমটি বাতিল বলে গণ্য হবে।</div>
        <div class="p-2 font-18">২। ফরমে উল্লেখিত তথ্যাবলী যথাযথ কর্তৃপক্ষ কর্তৃক নিরীক্ষাই চূড়ান্ত বলে গণ্য হবে।</div>
        <div class="p-2 font-18">৩। পরীক্ষার্থী কর্তৃক এন্ট্রি ফরমে কোন অসত্য তথ্য লেখা হলে ও পরবর্তীতে তা প্রকাশ পেলে উক্ত পরীক্ষা বাতিল বলে গণ্য হবে এবং বিধি মোতাবেক ব্যবস্থা গ্রহণ করা হবে।</div>
    </div>

    <div class="page-break"></div>

    <div class="mt-3">
        <h4 class="text-center" style="font-weight: 600">পরীক্ষার্থীকে নিম্নের তথ্যাবলী স্বহস্তে পূরণ করতে হবে:</h4>
        <div class="font-18 p-2">১। পরীক্ষার্থীর পূর্ণ নাম (বাংলায়): <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data1 }} &nbsp; &nbsp; &nbsp</span></div>
        <div class="font-18 p-2">(এসএসসি/সমমান পরীক্ষার সার্টিফিকেট অনুযায়ী)</div>
        <div class="font-18 p-2">২। পরীক্ষার্থীর পূর্ণ নাম (ইংরেজী বড় অক্ষরে): <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data2 }} &nbsp; &nbsp; &nbsp;</span></div>
        <div class="font-18 p-2">(এসএসসি/সমমান পরীক্ষার সার্টিফিকেট অনুযায়ী)</div>
        <div class="font-18 p-2">৩। পিতার নাম: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data3 }} &nbsp; &nbsp; &nbsp;</span></div>
        <div class="font-18 p-2">৪। মাতার নাম: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data4 }} &nbsp; &nbsp; &nbsp;</span></div>
        <div class="row">
            <div class="col-sm-6">
                <div class="font-18 p-2">৫। স্থায়ী ঠিকানাঃ গ্রাম: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data5 }} &nbsp; &nbsp; &nbsp;</span></div>
                <div class="font-18 p-2">থানা/উপজেলা: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data7 }} &nbsp; &nbsp; &nbsp;</span></div>
            </div>
            <div class="col-sm-6">
                <div class="font-18 p-2">পো: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data6 }} &nbsp; &nbsp; &nbsp;</span></div>
                <div class="font-18 p-2">জেলা: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data8 }} &nbsp; &nbsp; &nbsp;</span></div>
            </div>
        </div>
        <div class="font-18 p-2">৬। জন্ম তারিখ (এসএসসি/সমমান পরীক্ষার সার্টিফিকেট অনুযায়ী): <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data9 }} &nbsp; &nbsp; &nbsp;</span></div>
        <div class="font-18 p-2">৭। জাতীয়তা: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data10 }} &nbsp; &nbsp; &nbsp;</span> ধর্ম: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data11 }} &nbsp; &nbsp; &nbsp;</span> বর্ণ/সম্প্রদায়: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data12 }} &nbsp; &nbsp; &nbsp;</span></div>
        <div class="font-18 p-2">৮। এসএসসি/সমমান পরীক্ষা পাশের সনঃ <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data13 }} &nbsp; &nbsp; &nbsp;</span> রোল নং: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data14 }} &nbsp; &nbsp; &nbsp;</span> ফলাফল: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data15 }} &nbsp; &nbsp; &nbsp;</span> বোর্ডের নাম: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data16 }} &nbsp; &nbsp; &nbsp;</span> শিক্ষা প্রতিষ্ঠানের নাম: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data17 }} &nbsp; &nbsp; &nbsp;</span></div>
        <div class="font-18 p-2">৯। এইচএসসি/সমমান পরীক্ষা পাশের সনঃ <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data18 }} &nbsp; &nbsp; &nbsp;</span> রোল নং: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data19 }} &nbsp; &nbsp; &nbsp;</span> ফলাফল: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data20 }} &nbsp; &nbsp; &nbsp;</span> বোর্ডের নাম: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data21 }} &nbsp; &nbsp; &nbsp;</span> শিক্ষা প্রতিষ্ঠানের নাম: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data22 }} &nbsp; &nbsp; &nbsp;</span></div>
        <div class="font-18 p-2">
            ১০। পরীক্ষার্থী বিশ্ববিদ্যালয়ের কোন পরীক্ষায় অংশগ্রহন করে কখনও বহিষ্কৃত হয়ে থাকলে, শান্তির মেয়াদ উল্লেখ করতে হবে। 
            পরীক্ষার নাম: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data23 }} &nbsp; &nbsp; &nbsp;</span>, লেভেল: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data24 }} &nbsp; &nbsp; &nbsp;</span>, টার্ম: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data25 }} &nbsp; &nbsp; &nbsp;</span>, পরীক্ষার সন: <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data26 }} &nbsp; &nbsp; &nbsp;</span> শান্তির মেয়াদঃ <span class="border_custom">&nbsp; &nbsp; &nbsp; {{ @$data->data27 }} &nbsp; &nbsp; &nbsp;</span>
        </div>
        <div class="font-18 p-2" style="font-weight: 600">১১। পরীক্ষায় অবতীর্ণ হওয়ার বিষয় কোড ও বিষয় (কোন কাটাকাটি বা ঘষামাজা চলবে না)</div>
        <div class="">
            <table class="bn font-19" style="font-weight: 600">
                <tr>
                    <th style="width: 50px; text-align: center;">ক্রম</th>
                    <th style="text-align: center;">বিষয় কোড</th>
                    <th style="text-align: center;">বিষয়ের নাম</th>
                    <th style="width: 50px; text-align: center;">ক্রম</th>
                    <th style="text-align: center;">বিষয় কোড</th>
                    <th style="text-align: center;">বিষয়ের নাম</th>
                </tr>
                <tr>
                    <td style="text-align: center;">১.</td>
                    <td style="text-align: center;">{{ @$data->data28 }}</td>
                    <td style="text-align: center;">{{ @$data->data29 }}</td>
                    <td style="text-align: center;">৮.</td>
                    <td style="text-align: center;">{{ @$data->data30 }}</td>
                    <td style="text-align: center;">{{ @$data->data31 }}</td>
                </tr>
                <tr>
                    <td style="text-align: center;">২.</td>
                    <td style="text-align: center;">{{ @$data->data32 }}</td>
                    <td style="text-align: center;">{{ @$data->data33 }}</td>
                    <td style="text-align: center;">৯.</td>
                    <td style="text-align: center;">{{ @$data->data34 }}</td>
                    <td style="text-align: center;">{{ @$data->data35 }}</td>
                </tr>
                <tr>
                    <td style="text-align: center;">৩.</td>
                    <td style="text-align: center;">{{ @$data->data36 }}</td>
                    <td style="text-align: center;">{{ @$data->data37 }}</td>
                    <td style="text-align: center;">১০.</td>
                    <td style="text-align: center;">{{ @$data->data38 }}</td>
                    <td style="text-align: center;">{{ @$data->data39 }}</td>
                </tr>
                <tr>
                    <td style="text-align: center;">৪.</td>
                    <td style="text-align: center;">{{ @$data->data40 }}</td>
                    <td style="text-align: center;">{{ @$data->data41 }}</td>
                    <td style="text-align: center;">১১.</td>
                    <td style="text-align: center;">{{ @$data->data42 }}</td>
                    <td style="text-align: center;">{{ @$data->data43 }}</td>
                </tr>
                <tr>
                    <td style="text-align: center;">৫.</td>
                    <td style="text-align: center;">{{ @$data->data44 }}</td>
                    <td style="text-align: center;">{{ @$data->data45 }}</td>
                    <td style="text-align: center;">১২.</td>
                    <td style="text-align: center;">{{ @$data->data46 }}</td>
                    <td style="text-align: center;">{{ @$data->data47 }}</td>
                </tr>
                <tr>
                    <td style="text-align: center;">৬.</td>
                    <td style="text-align: center;">{{ @$data->data48 }}</td>
                    <td style="text-align: center;">{{ @$data->data49 }}</td>
                    <td style="text-align: center;">১৩.</td>
                    <td style="text-align: center;">{{ @$data->data50 }}</td>
                    <td style="text-align: center;">{{ @$data->data51 }}</td>
                </tr>
                <tr>
                    <td style="text-align: center;">৭.</td>
                    <td style="text-align: center;">{{ @$data->data52 }}</td>
                    <td style="text-align: center;">{{ @$data->data53 }}</td>
                    <td style="text-align: center;">১৪.</td>
                    <td style="text-align: center;">{{ @$data->data54 }}</td>
                    <td style="text-align: center;">{{ @$data->data55 }}</td>
                </tr>

            </table>
        </div>
        <p></p>
    </div>

    <div class="mt-2 p-2">
        <div class="row">
            <div class="col-sm-6">
                <div style="margin-top: 100px;">........................................................................................</div>
                <div class="font-19">পরীক্ষা কমিটির চেয়ারম্যান-এর স্বাক্ষর, তারিখ ও সীল</div>
            </div>
            <div class="col-sm-6">
                <div class="text-right">
                    <img src="{{ asset('/uploads/' . $data->data60) }}" style="width: 180px; height: 70px;" alt=""><br>
                    <div class="font-19">{{ @$data->data58 }}</div>
                    <div class="">........................................................................................</div>
                    <div class="font-19">পরীক্ষার্থীর স্বাক্ষর ও তারিখ</div>
                </div>
                
            </div>
        </div>
        <p class="mt-3 p-2 font-19" style="font-weight: 600;">বিঃ দ্রঃ শিক্ষার্থী যে সকল বিষয়/বিষয়সমূহে কোর্স রেজিস্ট্রেশন করেছে তাকে কেবলমাত্র সে সকল বিষয়/বিষয়সমূহেরই এন্ট্রি ফরম পূরণ করতে হবে। অতিরিক্ত কোন বিষয়/বিষয়সমূহের পরীক্ষায় অংশগ্রহন করলে উক্ত পরীক্ষা বাতিল বলে গণ্য হবে।</p>
    </div>
   
</div>


