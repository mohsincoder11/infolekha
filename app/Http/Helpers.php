<?php

use App\Models\BlogLike;
use App\Models\JobVacancy;
use App\Models\transaction;
use App\Models\User;
use App\Models\UserLikeModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

function send_sms($number)
{
    if (url('/') == 'http://localhost/webmedia-project/infolekha') {
        return 1234;
    }
    $otp = rand(1000, 9999);
    $url = 'http://bulksms.webmediaindia.com/sendsms?uname=habitm1&pwd=habitm1&senderid=ILEKHA&to=' . $number . '&msg=Dear user Please enter this OTP ' . $otp . ' to verify your account. Thank you for choosing INFOlekha.org.&route=T&peid=1701168292124454704&tempid=1707168309589390057';
    $response = Http::get($url);
    if ($response->successful()) {
        return $otp;
    } else {
        return false;
    }
}


function check_if_like($college_id)
{
    if (Auth::check()) {
        $check = UserLikeModel::where(
            [
                'user_id' => Auth::user()->id,
                'college_id' => $college_id
            ]
        )->first();
        if ($check) {
            return 'active_heart';
        } else {
            return '';
        }
    } else {
        return '';
    }
}

function check_if_blog_like($blog_id)
{
    if (Auth::check()) {
        if (BlogLike::where(
            [
                'user_id' => Auth::user()->id,
                'blog_id' => $blog_id
            ]
        )->exists()) {
            return 'active_like';
        } else {
            return '';
        }
    } else {
        return '';
    }
}

function blog_like_count($blog_id)
{
    $count = DB::table('blog_likes')->where('blog_id', $blog_id)->count();
    return formatLargeNumber($count);
}

function blog_comment_count($blog_id)
{
    $count = DB::table('blog_comments')->where('blog_id', $blog_id)->count();
    return formatLargeNumber($count);
}

function blog_share_count($blog_id)
{
    $count = DB::table('blog_shares')->where('blog_id', $blog_id)->count();
    return formatLargeNumber($count);
}

function formatLargeNumber($number)
{
    if ($number < 1000) {
        return $number; // No formatting needed for numbers under 1000.
    } elseif ($number < 1000000) {
        if ($number % 1000 === 0) {
            return number_format($number / 1000) . 'K'; // Format as 1k, 2k, etc.
        } else {
            return number_format($number / 1000, 1) . 'K'; // Format as 1.5k, etc.
        }
    } else {
        if ($number % 1000000 === 0) {
            return number_format($number / 1000000) . 'M'; // Format as 1m, 2m, etc.
        } else {
            return number_format($number / 1000000, 1) . 'M'; // Format as 1.5m, etc.
        }
    }
}







function check_user_applied_job($job_id)
{
    if (DB::table('job_vacancy_applieds')->where(['tutor_id' => Auth::user()->id, 'job_vacancy_id' => $job_id])->exists()) {
        return true;
    } else {
        return false;
    }
}


function get_college_rating($college_id)
{
    $averageRating = DB::table('user_feedback')
        ->where('college_id', $college_id)
        ->avg('rating');
    return number_format($averageRating, 1);
}

function get_board_name($id)
{
    $board_name = DB::table('school_types')->where('id', $id)->first()->type;
    return $board_name ?? '';
}

function get_college_stream()
{
    $stream = ['Arts', 'Commerce', 'Science'];
    return $stream;
}

function check_announcement_payment($AnnouncementID = null)
{
    $check = transaction::where('user_id', auth::user()->id)->where('AnnouncementID', $AnnouncementID)->where('type', 'Announcement')->first();
    if ($check) {
        if ($check->transaction_status == 'success') {
            $status = 'Paid';
        } else {
            $status = '<a href="' . route('school_profile.announcement-package', $AnnouncementID) . '">Make Payment</a>';
        }
    } else {
        $status = 'N/A';
    }
    return $status;
}

function checkpayment_status()
{
    $check_transaction = transaction::where('user_id', auth::user()->id)->where('type', 'Subscription')->where('transaction_status', 'success')->orderby('id', 'desc')->first();
    if ($check_transaction) {
        $expiry_check = \Carbon\Carbon::parse($check_transaction->expiry);
        $active_status = User::find(auth::user()->id);
        if ($check_transaction && !$expiry_check->isPast() && $active_status->active == '0') {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function checkreject_status()
{
    $check_transaction = transaction::where('user_id', auth::user()->id)->where('type', 'Subscription')->where('transaction_status', 'success')->orderby('id', 'desc')->first();
    if ($check_transaction) {
        $expiry_check = \Carbon\Carbon::parse($check_transaction->expiry);
        $active_status = User::find(auth::user()->id);
        //if($check_transaction && !$expiry_check->isPast() && $active_status->active=='2'){
        if ($active_status->active == '2') {
            return ['status' => true, 'message' => $active_status->note];
        } else {
            return ['status' => false, 'message' => ''];
        }
    } else {
        return false;
    }
}

function check_announcement_payment_status($AnnouncementID = null, $user_id = null)
{
    $check = transaction::where('user_id', $user_id)->where('AnnouncementID', $AnnouncementID)
        ->where('type', 'Announcement')->first();
    if ($check) {
        if ($check->transaction_status == 'success') {
            $status = 'Paid';
        } else {
            $status = 'Pending';
        }
    } else {
        $status = 'N/A';
    }
    return $status;
}

function vacancy_count()
{
    $count = JobVacancy::join('users', 'users.id', 'job_vacancy.college_id')
        ->where('users.active', '1')
        ->count();
    return $count;
}

function get_school_course()
{
    $optionsArray = [
        "Nursery",
        "Pre-Primary",
        "Primary",
        "Junior KG",
        "Senior KG",
        "1st Standard",
        "2nd Standard",
        "3rd Standard",
        "4th Standard",
        "5th Standard",
        "6th Standard",
        "7th Standard",
        "8th Standard",
        "9th Standard",
        "10th Standard"
    ];
    return $optionsArray;
}

function get_institute_course()
{
    $optionsArray = [
        "Yoga",
        "Photography",
        "Acting and Anchoring",
        "Junior Basic Training (JBT)",
        "Travel and Tourism",
        "Event Management",
        "Paramedical Courses",
        "Nursing courses",
        "Web Designing",
        "Digital Marketing",
        "Graphic Design",
        "Tally",
        "Interior Design",
        "Beautician",
        "Hardware and Networking",
        "Photography",
        "Air Hostess",
        "MSCIT",
        "MS-Excel",
        "MS-Word",
        "MS-Powerpoint",
        "Computer Classes",
        "DTP Classes"
    ];
    return $optionsArray;
}

function get_college_course()
{
    $optionsArray = [
        "11th",
        "12th",
        "B.com",
        "M.com",
        "LLB",
        "LLM",
        "BBA",
        "MBA",
        "CA Foundation",
        "CA IPCC",
        "CA Final",
        "CS Foundation",
        "CS Executive",
        "CS Professional",
        "ICWA Foundation",
        "ICWA Inter",
        "ICWA Final",
        "Bachelor in Technology (B.Tech)",
        "Bachelor in Engineering (BE)",
        "JEE-Main",
        "GATE",
        "UPCET",
        "BITSAT",
        "Bachelor of Science (B. Sc.)",
        "Bachelor of Architecture (B.Arch.)",
        "Architecture Designer",
        "Interior Designer",
        "Software Engineer",
        "Research Analyst",
        "MBBS (Bachelor of Medicine and Bachelor of Surgery)",
        "NEET Entrance exam",
        "BDS (Bachelor of Dental Surgery)",
        "Botany/Zoology/Chemistry",
        "Biochemistry",
        "BHMS (Bachelor of Homeopathy Medicine and Surgery)",
        "B. Pharmacy",
        "BPT (Bachelor of Physiotherapy)",
        "BAMS (Bachelor of Ayurvedic Medicine Surgery)",
        "BUMS (Bachelor of Unani Medicine and Surgery)",
        "Bioinformatics",
        "Genetics",
        "Forensic Sciences",
        "Biotechnology",
        "Environmental Science",
        "Nursing",
        "Bachelor in Business Studies",
        "Bachelor of Legislative Law",
        "CLAT",
        "Bachelor of Management Studies",
        "Certified Financial Planner (CFP)",
        "Financial Analyst and Advisor",
        "Investment Banking Analyst",
        "Bachelor of Arts (BA) - 3 years",
        "Master of Arts (MA)",
        "Bachelor of Computer Application (BCA) - 3 years",
        "Bachelor of Hotel Management (BHM)",
        "Bachelor of Journalism & Mass Communication (BJMC) - 3 years",
        "Bachelor of Elementary Education (B.El.Ed) - 4 years",
        "Bachelor of Fine Arts (BFA) - 3 years",
        "Fashion Designing - 3 to 4 years",
        "Diploma in IT"
    ];
    return $optionsArray;
}

function get_facilities()
{
    $optionsArray = [
        "Classrooms",
        "Digital classroom",
        "Playground & Sports facilities",
        "A/c classroom",
        "Canteen / Cafeterias",
        "Security System (CCTV, Security Guards, Other)",
        "Biometric Attendance Monitoring System",
        "Library",
        "Computer Lab",
        "Laboratories",
        "Garden",
        "Conference rooms",
        "Auditoriums",
        "Transportation",
        "Indoor sports arena",
        "Amphitheatre",
        "Multipurpose Hall.",
        "Counselling Centre",
        "Activity Rooms",
        "Art rooms",
        "Mathematics Laboratory",
        "Health center",
        "Art studios",
        "Music rooms",
        "Administrative offices",
        "Restrooms",
        "Parking lots",
        "Outdoor learning spaces",
        "Career and technical education facilities",
        "Multi-purpose rooms",
        "Daycare facilities",
        "Storage areas",
        "Staff lounges",
        "Conference rooms",
        "Prayer and meditation rooms",
        "Reading corners",
        "Emergency response resources",
        "Innovation centers",
        "Distance learning facilities",
        "Athletic facilities",
        "Parent resource centers",
        "Lecture halls",
        "Dormitories and housing facilities",
        "Student-run enterprises"
    ];
    return $optionsArray;
}

function get_blog_categories()
{
    $optionsArray = [
        "Physics",
        "Mathematics",
        "Computer Science and Information Technology",
        "Biology and Life Sciences",
        "Chemistry",
        "Engineering and Technology",
        "Astronomy and Space Science",
        "Environmental Science",
        "History and Culture",
        "Literature and Language",
        "Sociology and Anthropology",
        "Psychology and Mental Health",
        "Philosophy and Ethics",
        "Economics",
        "Law and Legal Studies",
        "Geography and Geology",
        "Finance and Accounting",
        "Business and Entrepreneurship",
        "Marketing and Sales",
        "Management and Leadership",
        "Digital Marketing and Social Media",
        "Entrepreneurship and Innovation",
        "Personal Finance and Money Management",
        "Education and Teaching Methods",
        "Career Development and Job Skills",
        "Study Skills and Exam Preparation",
        "Educational Technology and Classroom Resources",
        "Online Learning and E-Learning Tools",
        "Early Childhood Education and Development",
        "Special Education and Inclusive Practices",
        "Parent-Teacher Collaboration and Engagement",
        "Art and Design",
        "Music and Performing Arts",
        "Fine Arts and Creative Expression",
        "Graphic Design and Visual Arts",
        "Fashion Design and Styling",
        "Film Studies and Criticism",
        "Drama and Theater Arts",
        "Photography and Visual Communication",
        "Health and Wellness",
        "Nutrition and Dietetics",
        "Psychology and Mental Health",
        "Sports Science and Athletics",
        "Health Sciences and Medicine",
        "Yoga and Meditation",
        "Mindfulness and Self-Care",
        "Holistic Health and Alternative Therapies",
        "Social Studies and Civics",
        "Cultural Studies and Diversity",
        "Anthropology and Sociology",
        "Cultural Heritage and Preservation",
        "Gender Studies and Women's Empowerment",
        "Global Issues and International Relations",
        "Travel and Cultural Studies",
        "Linguistics and Language Learning",
    ];
    return $optionsArray;
}

function permission_row($module, $view, $edit, $delete)
{
    $row = '<tr>
        <td>' . ucwords($module) . '</td>';

    $row .= '<td>';
    if (!empty($view)) {
        $row .= '<label> 
            <input type="checkbox" class="form-check-input" value="' . $view . '" name="permissions[]">
        </label>';
    }
    $row .= '</td>';

    $row .= '<td>';
    if (!empty($edit)) {
        $row .= '<label> 
            <input type="checkbox" class="form-check-input" value="' . $edit . '" name="permissions[]">
        </label>';
    }
    $row .= '</td>';

    $row .= '<td>';
    if (!empty($delete)) {
        $row .= '<label> 
            <input type="checkbox" class="form-check-input" value="' . $delete . '" name="permissions[]">
        </label>';
    }
    $row .= '</td>';

    $row .= '</tr>';

    return $row;
}


function permission_row_model($module, $view, $edit, $delete)
{
    $row = '<tr>
        <td>' . ucwords($module) . '</td>';

    $row .= '<td>';
    if (!empty($view)) {
        $row .= '<label> 
            <input type="checkbox" class="form-check-input model_checkbox" value="' . $view . '" name="permissions[]">
        </label>';
    }
    $row .= '</td>';

    $row .= '<td>';
    if (!empty($edit)) {
        $row .= '<label> 
            <input type="checkbox" class="form-check-input model_checkbox" value="' . $edit . '" name="permissions[]">
        </label>';
    }
    $row .= '</td>';

    $row .= '<td>';
    if (!empty($delete)) {
        $row .= '<label> 
            <input type="checkbox" class="form-check-input model_checkbox" value="' . $delete . '" name="permissions[]">
        </label>';
    }
    $row .= '</td>';

    $row .= '</tr>';

    return $row;
}

function can_access_route()
{
    $admin = Auth::guard('admin')->user();
    $currentRoute = Route::currentRouteName();
    $permissions = $admin->permissions_array;
    if (in_array($currentRoute, $permissions)) {
        return true;
    }
    return false;
}

function can_view_this($route)
{
    $admin = Auth::guard('admin')->user();
    if($admin->role=='0'){
        return true;
    }
    $currentRoute = $route;
    $permissions = $admin->permissions_array;
    if (in_array($currentRoute, $permissions)) {
        return true;
    }
    return false;
}

function can_access_filtered_route($mode)
{
    $admin = Auth::guard('admin')->user();
    $permissions = $admin->permissions_array;
    $filteredPermissions = [
         "admin.master.subscription",
         "admin.master.coupon",
         "admin.master.advertisement",
         "admin.master.announcement",
         "admin.master.banner-image",
         "admin.master.default-otp",
         "admin.registration.college",
         "admin.registration.institute",
         "admin.registration.student",
         "admin.registration.tutor",
         "admin.transaction",
         "admin.announcement",
         "admin.advertisement",
         "admin.blog",
    ];
    $filteredPermissions = array_values(array_intersect($filteredPermissions, $permissions));
    if ($mode == 'check' && count($permissions) > 0) {
        return true;
    } elseif ($mode == 'route_name' && count($permissions) > 0 && count($filteredPermissions)>0) {

        return $filteredPermissions[0];
    }
    return false;
}
