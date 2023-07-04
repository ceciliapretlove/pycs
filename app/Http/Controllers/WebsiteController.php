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
    public function humbleBegginingsOfPycs()
    {
        return view('website-pages.humble-begginings-of-pycs');
    }
    public function philosophyAndInstitutionalObjectives()
    {
        return view('website-pages.philosophy-and-institutional-objectives');
    }  
    public function disciplineStandardsandPolicies()
    {
        return view('website-pages.general-standards-and-policies');
    }

    public function healthStandardsandPolicies()
    {
        return view('website-pages.health-standards-and-policies');
    }

    public function disciplinePolicies()
    {
        return view('website-pages.discipline-policies');
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

    public function classPeriodsAndLearningCycle()
    {
        return view('website-pages.class-periods-and-learning-cycle');
    }
    public function enrollmentOfLearners()
    {
        return view('website-pages.enrollment-of-learners');
    }
    public function admissionRequirements()
    {
        return view('website-pages.admission-requirements');
    }

    public function admissionProcedure()
    {
        return view('website-pages.admission-procedure');
    }

    public function policiesForEarlyRegistration()
    {
        return view('website-pages.policies-for-early-registration');
    }

    public function policyOnWithholdingOfCredentials()
    {
        return view('website-pages.policy-on-withholding-of-credentials');
    }

//School Calendar
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
        public function gradingsystem()
    {
        return view('website-pages.grading-system');
    }

        public function promotionandretention()
    {
        return view('website-pages.promotion-and-retention');
    }

        public function others()
    {
        return view('website-pages.others');
    }

    // Article 1
        public function article1()
    {
        return view('website-pages.visitation-of-the-head-consul--mr-ren-faqiang');
    }
        public function article2()
    {
        return view('website-pages.chinese-new-year-celebration');
    }


        public function article3()
    {
        return view('website-pages.culminating-activities');
    }

        public function article4()
    {
        return view('website-pages.2022-year-end-program');
    }
            public function article5()
    {
        return view('website-pages.pycs-intramurals');
    }
        public function article6()
    {
        return view('website-pages.75th-founding-anniversary');
    }

        public function article7()
    {
        return view('website-pages.teachers-congress-and-team-building-activities');
    }

        public function article8()
    {
        return view('website-pages.litmus-grade7');
    }


        public function article9()
    {
        return view('website-pages.litmus-grade8');
    }


        public function article10()
    {
        return view('website-pages.litmus-grade9');
    }

        public function article11()
    {
        return view('website-pages.litmus-grade10');
    }

        public function article12()
    {
        return view('website-pages.litmus-lower-grade-department');
    }

        public function article13()
    {
        return view('website-pages.litmus-pre-elementary-department');
    }
        public function article14()
    {
        return view('website-pages.litmus-upper-grade-department');
    }

        public function article15()
    {
        return view('website-pages.braver-bolder-ready-to-conquer');
    }
}
