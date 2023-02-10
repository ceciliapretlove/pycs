<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        return view('website-pages.welcome');
    }


//About
    public function about()
    {
        return view('website-pages.about');
    }
        
    public function disciplineStandardsandPolicies()
    {
        return view('website-pages.discipline-standards-and-policies');
    }

    public function healthStandardsandPolicies()
    {
        return view('website-pages.health-standards-and-policies');
    }

    public function offensesandSanctions()
    {
        return view('website-pages.offenses-and-sanctions');
    }

    public function generalPolicies()
    {
        return view('website-pages.general-policies');
    }

// Admission
    
    public function enrollment()
    {
        return view('website-pages.enrollment');
    }

    public function admission()
    {
        return view('website-pages.admission');
    }
    public function schoolcalendar()
    {
        return view('website-pages.school-calendar');
    }
    
    public function galleries()
    {
        return view('website-pages.galleries');
    }
    
    public function curriculum()
    {
        return view('website-pages.curriculum');
    }

        public function preelementary()
    {
        return view('website-pages.pre-elementary');
    }

        public function gradeschool()
    {
        return view('website-pages.grade-school');
    }

        public function juniorhs()
    {
        return view('website-pages.junior-hs');
    }

        public function seniorhs()
    {
        return view('website-pages.senior-hs');
    }
            public function specialprogram()
    {
        return view('website-pages.special-program');
    }

        public function academicstandard()
    {
        return view('website-pages.academic-standard');
    }
        public function schoolyearendactivities()
    {
        return view('website-pages.school-year-end-activities');
    }

                public function schoolprograms()
    {
        return view('website-pages.school-programs');
    }

                    public function clubsorganization()
    {
        return view('website-pages.clubs-organization');
    }
}
