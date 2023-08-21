<?php

use App\Models\JobVacancy;
use App\Models\transaction;
use App\Models\UserLikeModel;
use Illuminate\Support\Facades\Auth;

function check_if_like($college_id)
{
    if(Auth::check()){
    $check = UserLikeModel::where(
        [
            'user_id' => Auth::user()->id, 'college_id' => $college_id
        ]
    )->first();
    if ($check) {
        return 'active_heart';
    } else {
        return '';
    }
}
else{
    return '';

}
}


function get_college_rating($college_id)
{  
    $averageRating = DB::table('user_feedback')
    ->where('college_id', $college_id)
    ->avg('rating');
    return number_format($averageRating,1);
}

function get_board_name($id)
{ 
    $board_name=DB::table('school_types')->where('id',$id)->first()->type;
    return $board_name ?? '';
}

function get_college_stream(){
    $stream=['Arts','Commerce','Science'];
    return $stream;
}

function check_announcement_payment($AnnouncementID=null){
    $check=transaction::where('user_id',auth::user()->id)->where('AnnouncementID',$AnnouncementID)->where('type','Announcement')->first();
    if($check){
        if($check->transaction_status=='success'){
            $status='Paid';
        }else{
            $status = '<a href="' . route('school_profile.announcement-package', $AnnouncementID) . '">Make Payment</a>';

        }
    }else{
        $status='N/A';
    }
    return $status;
}

function check_announcement_payment_status($AnnouncementID=null,$user_id=null){
    $check=transaction::where('user_id',$user_id)->where('AnnouncementID',$AnnouncementID)
    ->where('type','Announcement')->first();
    if($check){
        if($check->transaction_status=='success'){
            $status='Paid';
        }else{
            $status = 'Pending';

        }
    }else{
        $status='N/A';
    }
    return $status;
}

function vacancy_count(){
    $count=JobVacancy::count();
    return $count;
}

function get_school_course(){
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

function get_institute_course(){
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

function get_college_course(){
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

function get_facilities(){
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

    function get_blog_categories(){
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