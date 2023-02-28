@extends('layouts.webapp')
@section('content')
<div class="page-banner-area bg-2">
   <div class="container">
      <div class="page-banner-content">
         <h1>General Standards and Policies</h1>
      </div>
   </div>
</div>
<div class="graduate-admission pt-100 pb-70">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="overview">
               <p>Discipline involves the systematic training of the mental, physical, and moral powers by instruction and
                  exercise. The end result of this process is orderly conduct flowing form internal self-control.
                  Discipline, therefore, strongly implies commitment of one’s effort towards developing orderly behavior
                  in oneself, contributing to the climate of efficient learning in the classroom, and sharing in the
                  responsibility of strengthening discipline in the school.
               </p>
               <p>
                  Discipline is NOT to identified with external punishment. Neither is discipline to be regarded as a
                  continual repression of one’s energies nor is the complete external domination of the teacher and other
                  persons of authority over a certain learner or learners and/or over the class. Rather, discipline emanates
                  from one’s personal competence and moral credibility which energizes each and every learner or
                  personnel to strive for excellence in whatever they do.
               </p>
               <div class="overview-box">
                  <h4>School Uniform</h4>
                  <p>Assessment is the gathering of information about learning. It can be used for formative purposes – to
                     adjust instruction – or summative purposes; to render a judgement about the quality of work. One of the
                     major purposes of assessment is to provide feedback to learners. And it is a key instructional activity,
                     and teachers engage in it every day in a variety of informal and formal ways.
                  </p>
                  <div class="enrollment-for-learners">
                     <div class="row">
                        <div class="col-lg-12 col-md-12">
                           <ol>
                              <li>
                                 The PYCS uniform should be worn properly and completely at all times except on days enumerated below:
                                 <div class="circle-list px-3">
                                    <div class="row">
                                       <div class="col-lg-12 col-md-12">
                                          <ul>
                                             <li><i class="ri-checkbox-circle-line"></i>Intramurals</li>
                                             <li><i class="ri-checkbox-circle-line"></i>Other days specified by the school during the current school year</li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="mx-3">
                                    <h6><em>For Male Learners</em></h6>
                                    <div class="circle-list px-1 py-2 small-font ">
                                       <div class="row">
                                          <div class="col-lg-12 col-md-12">
                                             <ul>
                                                <li><i class="ri-checkbox-circle-line"></i>Properly tucked white sports collared polo with left pocket, department plate, and school logo</li>
                                                <li><i class="ri-checkbox-circle-line"></i>Khaki shorts (for Pre-elementary to Grade 3 learners)</li>
                                                <li><i class="ri-checkbox-circle-line"></i>Khaki slacks (for Grade 4 to Senior High School learners)</li>
                                                <li><i class="ri-checkbox-circle-line"></i>Well-polished black leather school shoes</li>
                                                <li><i class="ri-checkbox-circle-line"></i>Clean white socks</li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="mx-3">
                                    <h6><em>For Female Learners</em></h6>
                                    <div class="circle-list px-1 py-2 small-font ">
                                       <div class="row">
                                          <div class="col-lg-12 col-md-12">
                                             <ul>
                                                <li><i class="ri-checkbox-circle-line"></i>Properly tucked white sports collared blouse with left pocket, department plate, and school logo</li>
                                                <li><i class="ri-checkbox-circle-line"></i>Round pleated navy blue skirt (hemline should be 2 inches below the knee cap)</li>
                                                <li><i class="ri-checkbox-circle-line"></i>Well-polished closed black leather school shoes (flat or with heels not higher than half an inch)</li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="mx-3">
                                    <h6><em>P.E. Uniform</em></h6>
                                    <div class="circle-list px-1 py-2 small-font ">
                                       <div class="row">
                                          <div class="col-lg-12 col-md-12">
                                             <ul>
                                                <li><i class="ri-checkbox-circle-line"></i>Official blue jogging pants</li>
                                                <li><i class="ri-checkbox-circle-line"></i>Chinese collared polo shirt</li>
                                                <li><i class="ri-checkbox-circle-line"></i>White T-shirt with the printed logo of the school (worn during P.E. time)</li>
                                                <li><i class="ri-checkbox-circle-line"></i>Clean plain sneakers or rubber shoes of any color</li>
                                                <li><i class="ri-checkbox-circle-line"></i>Clean white socks</li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li>Senior high school learners should strictly follow the prescribed uniform. Cut and design are available in the administration office.</li>
                           </ol>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="overview-box">
                  <h4>School ID</h4>
                  <div class="circle-list px-3">
                     <div class="row">
                        <div class="col-lg-12 col-md-12">
                           <ul>
                              <li><i class="ri-checkbox-circle-line"></i>The learner ID with the prescribed ID lace is always a part of the school attire.</li>
                              <li><i class="ri-checkbox-circle-line"></i>No Yuh Chiauian may wear school uniform indiscriminately in public where the school’s reputation will be adversely affected. Negligence and/or failure to follow this regulation will mean a disciplinary sanction.</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
                               <div class="overview-box text-center">
                  {{-- <h4>Prescribed School Uniform</h4> --}}
                  <h5 class="mt-5">PRE-ELEMENTARY</h5>
                  <img class="mb-5" src="assets/images/uniforms/pre-elementary.jpg">
                  <h5 class="mt-5">LOWER GRADE SCHOOL</h5>
                  <img class="mb-5" src="assets/images/uniforms/lower-grade.jpg">
                  <h5 class="mt-5">UPPER GRADE SCHOOL TO JUNIOR HIGH SCHOOL</h5>
                  <img class="mb-5" src="assets/images/uniforms/upper-grade.jpg">
                  <h5 class="mt-5">SENIOR HIGH SCHOOL</h5>
                  <img class="mb-5" src="assets/images/uniforms/senior-hs.jpg">
                  <h5 class="mt-5">PE SCHOOL UNIFORM</h5>
                  <img class="mb-5" src="assets/images/uniforms/pe-uniform.jpg">
               </div>
               <div class="overview-box">
                  <h4>Grooming, Hairstyle and Accessories</h4>
                  <div class="circle-list px-3">
                     <div class="row">
                        <div class="col-lg-12 col-md-12">
                           <ul>
                              <li><i class="ri-checkbox-circle-line"></i>Learners in general are expected to be neat and clean in reporting to school.</li>
                              <li><i class="ri-checkbox-circle-line"></i>All male learners are required to have a neat barber’s haircut. The hair must not touch the eyebrows,the ears, and the nape.</li>
                              <li><i class="ri-checkbox-circle-line"></i>All female learners are required to have their hair drawn / pulled away from their faces by headbandor hair clip. For female learners with long hair should have their hair braided or should have their hair gathered using ponytail.</li>
                              <li><i class="ri-checkbox-circle-line"></i>Punk and/or outlandish haircut / hairstyle is strictly not allowed.</li>
                              <li><i class="ri-checkbox-circle-line"></i>Colored highlights and/or dyed/tinted hair are strictly discouraged.</li>
                              <li><i class="ri-checkbox-circle-line"></i>Nails should always be trimmed short.</li>
                              <li><i class="ri-checkbox-circle-line"></i>Artificial nails and eyelashes are not allowed.</li>
                              <li><i class="ri-checkbox-circle-line"></i>Make-up including but not limited to cheek tints, lipstick, and nail polish are strictly not allowed on ordinary school days.</li>
                              <li><i class="ri-checkbox-circle-line"></i>Body piercing like belly-button, tongue, eyebrows, etc. is not allowed.</li>
                              <li><i class="ri-checkbox-circle-line"></i>Wearing of tattoos, temporary or permanent is prohibited.</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
                     <div class="overview-box text-center">
               
                   <h5 class="mb-5">Neat Hairstyle for Girls</h5>
                  <img class="mb-5" src="assets/images/uniforms/neat-hairstyle-for-girls.jpg">
                  <img class="mb-5" src="assets/images/uniforms/neat-hairstyle-for-girls1.jpg">
           
                   <h5 class="mb-5">Prescribed Hair Cut for Boys</h5>
                  <img class="mb-5" src="assets/images/uniforms/prescribed-hair-cut-for-boys.jpg">
                  <img class="mb-5" src="assets/images/uniforms/prescribed-hair-cut-for-boys1.jpg">
               </div>
               <div class="overview-box">
                  <h4>Expected Behavior during General Assemblies</h4>
                  <p>Learners should observe proper behavior during assemblies. All learners stand at attention, join in the
                     community prayer, sing the national anthem, recite the national pledge, and sing the school hymn. General
                     morning assemblies shall be attended by all learners and personnel.
                  </p>
               </div>
               <div class="overview-box">
                  <h4>Policies and Guidelines on Attendance and Punctuality</h4>
                  <div class="circle-list px-3">
                     <div class="row">
                        <div class="col-lg-12 col-md-12">
                           <ul>
                              <li><i class="ri-checkbox-circle-line"></i>Prompt and regular attendance in all classes is required of all learners.</li>
                              <li><i class="ri-checkbox-circle-line"></i>Absences are counted from the first day of classes including those incurred due to late enrolment.</li>
                              <li><i class="ri-checkbox-circle-line"></i>On the third consecutive day of absence, it is required that parent / guardian inform the school of the
                                 reason for their children’s continued absences from school.
                              </li>
                              <li><i class="ri-checkbox-circle-line"></i>Upon returning to school, a learner should secure an <em>“admit to class slip”</em> from the Prefect of
                                 Discipline office presenting the letter of excuse written and duly signed by his parent / guardian.
                              </li>
                              <li><i class="ri-checkbox-circle-line"></i>Missed learning activities (provided that reason for absences is excuse / valid) can be obtained upon
                                 arrangements with the Department Coordinator and / or the School Principal.
                              </li>
                              <li><i class="ri-checkbox-circle-line"></i>Absent learners are held responsible for missed learning activities taken up during their unexcused
                                 absence.
                              </li>
                              <li><i class="ri-checkbox-circle-line"></i>Learners are marked late if they join their first period class just a minute after the official time.</li>
                              <li><i class="ri-checkbox-circle-line"></i>A tardy learner is issued a <em>warning slip</em> after the 3 rd instance and his parent/guardian is notified by the
                                 Department Coordinator or by the Prefect of Discipline officer.
                              </li>
                              <li><i class="ri-checkbox-circle-line"></i>On the 12 th instance of tardiness, a learner will be given appropriate disciplinary measures.</li>
                              <li><i class="ri-checkbox-circle-line"></i>Any learner who cuts classes (at least 15 minutes late without valid reason/s) will be referred to the
                                 POD office then to the Guidance Counselor’s office for disciplinary and counseling sessions.
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
                              <div class="overview-box">
                  <h4>Policies and Guidelines on Electronic Devices</h4>
                  <div class="circle-list px-3">
                     <div class="row">
                        <div class="col-lg-12 col-md-12">
                           <ul>
                              <li><i class="ri-checkbox-circle-line"></i>Bringing / using cellular phones, laptops, iPads, iPods, MP3s, cameras, CD players, and electronic
                                 game gadgets in the school premises is prohibited unless a subject teacher requires the learners to
                                 bring for instructional activities with permission from the Office of the Department Coordinator and
                                 the School Principal.
                              </li>
                              <li><i class="ri-checkbox-circle-line"></i>Learners who are given the permission should take full responsibility for whatever gadget they bring.</li>
                              <li><i class="ri-checkbox-circle-line"></i>The school will not be liable for the loss of such devices because learners are constantly reminded to
                                 be always responsible.
                              </li>
                              <li><i class="ri-checkbox-circle-line"></i>In case of emergency, a learner may use the school phone to contact his parent / guardian.</li>
                              <li>
                                 <i class="ri-checkbox-circle-line"></i>A learner caught NOT complying with the rules will be subjected to the following disciplinary
                                 measures:
                                 <dl class="row mt-4">
                                    <dt class="col-sm-3 text-end">First Offense : </dt>
                                    <dd class="col-sm-9">Immediate confiscation and to be redeemed <strong>only</strong> by the parent / guardian
                                       from the Office of the concerned English / Chinese Department
                                       Coordinator.
                                    </dd>
                                    <dt class="col-sm-3 text-end">Second Offense : </dt>
                                    <dd class="col-sm-9">Immediate confiscation and to be redeemed <strong>only</strong> by the parent /
                                       guardian from the Office of the concerned English / Chinese Department
                                       Coordinator after a period of <strong>one (1) month.</strong>
                                    </dd>
                                    <dt class="col-sm-3 text-end">Third Offense : </dt>
                                    <dd class="col-sm-9">Immediate confiscation and to be redeemed ONLY by the parent /
                                       guardian from the Office of the concerned English / Chinese Department
                                       Coordinator at the<strong> end of the school year.</strong>
                                    </dd>
                                 </dl>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="overview-box">
                  <h4>Expected Behavior during Health and Lunch Breaks</h4>
                  <div class="circle-list px-3">
                     <div class="row">
                        <div class="col-lg-12 col-md-12">
                           <ul>
                              <li><i class="ri-checkbox-circle-line"></i>All learners take their health and lunch breaks at their designated places only, such as canteen,
                                 social hall, and 1 st or 2 nd floor of the Mess Hall.
                              </li>
                              <li><i class="ri-checkbox-circle-line"></i>Only very young learners with special permission may remain in the classroom with their respective
                                 class advisers.
                              </li>
                              <li><i class="ri-checkbox-circle-line"></i>Learners are required to observe table manners whenever they eat.</li>
                              <li><i class="ri-checkbox-circle-line"></i>During breaks and at any time when learners are out of the classroom, they are expected to safe keep
                                 their things inside their bags.
                              </li>
                              <li><i class="ri-checkbox-circle-line"></i>Valuables like wallets and/or money purse should be kept in learner’ pocket at all times.</li>
                              <li><i class="ri-checkbox-circle-line"></i>Running in going down and up of the stairways are strictly prohibited.</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="overview-box">
                  <h4>Expected Behavior in the Lobbies and Hallways</h4>
                  <div class="circle-list px-3">
                     <div class="row">
                        <div class="col-lg-12 col-md-12">
                           <ul>
                              <li><i class="ri-checkbox-circle-line"></i>Loitering, loud chatting, and running along lobbies and hallways during academic hours are
                                 prohibited.
                              </li>
                              <li><i class="ri-checkbox-circle-line"></i>Clustering along the stairways that blocks or obstructs the smooth passage is prohibited.</li>
                              <li><i class="ri-checkbox-circle-line"></i>Learners are required to maintain proper conduct whenever they have activities held at the lobby
                                 and/or hallway.
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="overview-box">
                  <h4>Expected Behavior during Morning and Afternoon Dismissal</h4>
                  <div class="circle-list px-3">
                     <div class="row">
                        <div class="col-lg-12 col-md-12">
                           <ul>
                              <li><i class="ri-checkbox-circle-line"></i>All classes promptly end their activities at dismissal time.</li>
                              <li><i class="ri-checkbox-circle-line"></i>Learners line up and wait for their turn to go down with the last period teacher supervising them.</li>
                              <li><i class="ri-checkbox-circle-line"></i>In the afternoon, learners keep their things in their proper places and leave the classroom cleaned,
                                 whiteboard erased, lights, fans, and air-conditioned unit are switched off, faucets off, and chairs
                                 arranged.
                              </li>
                              <li><i class="ri-checkbox-circle-line"></i>The elected class chairman checks that no learner stays in the classroom, Science/Speech/Computer
                                 laboratory after dismissal time.
                              </li>
                              <li><i class="ri-checkbox-circle-line"></i>Learners who are still in school long after the dismissal time are required not to leave the PYCS
                                 campus until their parent or guardian fetches them.
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="overview-box">
                  <h4>Expected Behavior during Programs and Activities</h4>
                  <div class="circle-list px-3">
                     <div class="row">
                        <div class="col-lg-12 col-md-12">
                           <ul>
                              <li><i class="ri-checkbox-circle-line"></i>Learners are to remain with their respective class advisers in the place assigned to them.</li>
                              <li><i class="ri-checkbox-circle-line"></i>Learners are expected to observe proper conduct during programs and/or activities.</li>
                              <li><i class="ri-checkbox-circle-line"></i>Applauding boisterously is strictly prohibited.</li>
                              <li><i class="ri-checkbox-circle-line"></i>Learners observe order and silence when entering or leaving assembly areas.</li>
                              <li><i class="ri-checkbox-circle-line"></i>Learners may leave the assembly area only after the official closing of the program.</li>
                              <li><i class="ri-checkbox-circle-line"></i>Only very young learners with special permission may leave the assembly area with their respective
                                 class advisers.
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="overview-box">
                  <h4>Expected Behavior in the Campus and Offices</h4>
                  <div class="circle-list px-3">
                     <div class="row">
                        <div class="col-lg-12 col-md-12">
                           <ul>
                              <li><i class="ri-checkbox-circle-line"></i>Any damage done to school property is reported to the Prefect of Discipline officer or to the Property
                                 Custodian whether they are responsible for it or not.
                              </li>
                              <li><i class="ri-checkbox-circle-line"></i>Learners respect notices / reminders posted on the bulletin / announcement boards.</li>
                              <li><i class="ri-checkbox-circle-line"></i>Tampering with the posted notices / reminders is an offense that diversely affects the learner’s
                                 conduct grade.
                              </li>
                              <li><i class="ri-checkbox-circle-line"></i>Learners keep all areas of the building and campus clean and orderly.</li>
                              <li><i class="ri-checkbox-circle-line"></i>When learners go to any office or classroom, they knock politely, greet the person / persons in the
                                 office or the teacher in the classroom and give their message in a low but clear distinct voice.
                              </li>
                              <li><i class="ri-checkbox-circle-line"></i>Learners, likewise leave the office or the classroom courteously.</li>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>

            </div>
         </div>

      </div>
   </div>
</div>
@endsection