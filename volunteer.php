<?
  $page_title = "Volunteer" ;
  $page_template = "main";  
?>
<?php include("includes/_header.php"); ?>

<!-- VOLUNTEER PAGE CONTENT -->
<div class="feature_wrapper">
    <div class="row">
        <div class="nine columns">
            <h1>Volunteer</h1>
            <p>Become an elf! The Family Giving Tree depends almost entirely on our volunteers to perform the tasks necessary to ensure all wishes are fulfilled. If you'd like to help, check out what we have to offer.</p>
        </div>
        <div class="three columns">
            <img src="images/people/c-photo4.png" alt="Volunteer at Family Giving Tree">
        </div>
    </div>
</div>
<div class="row">
  <div class="three column">
    <ul class="side-nav hide-for-mobile" data-sticky>
      <!--<li><a href="#joinus">Join Us</a></li>-->
      <li><a href="#register">Join Us</a></li>
      <li><a href="#warehouse">The Warehouse</a></li>
      <!--<li><a href="#events">Events</a>-->
      <li><a href="#angelelf">Angel Elves</a></li>
      <li><a href="#celebrating">Celebrating Volunteers</a></li>
      <li><a href="#photos">Photos</a></li>
    </ul>
    <!-- duplicate nav -->
    <ul class="side-nav show-for-mobile">
      <!--<li><a href="#joinus">Join Us</a></li>-->
      <li><a href="#register">Join Us</a></li>
      <li><a href="#warehouse">The Warehouse</a></li>
      <li><a href="#angelelf">Angel Elves</a></li>
      <li><a href="#photos">Photos</a></li>
    </ul>
  </div>
  <div class="nine column">
    <section id="joinus">
      <br><br>
      <h3> Year-Round Volunteer Opportunities</h3>
      <div class="row">
      <div class="three columns">
        <p class="text-center"><img src="images/icons/office-help.png" width="120" height="120" alt="Office Help"></p>
        <p>General Office Help &amp; Drive Preparation: Help us organize materials and prep for our Back to School Drive and/or Holiday Wish Drive. Great for students!
        </p>
      </div>
      <div class="three columns">
        <p class="text-center"><img src="images/icons/no-drop-ins.png" width="120" height="120" alt="No Drop Ins"></p>
        <p>Please, no drop-ins. Email <a href="mailto:volunteers@familygivingtree.org">volunteers@<br>
          familygivingtree.org</a> or call (408) 946-3111 first. 
        </p>
      </div>
      <div class="three columns">
        <p class="text-center"><img src="images/icons/school-drive.png" width="120" height="120" alt="School Drive"></p>
        <p>Back to School Drive
        </p>
      </div>
      <div class="three columns">
        <p class="text-center"><img src="images/icons/card-sorting.png" width="120" height="120" alt="Card Sorting"></p>
        <p>Backpack Card sorting (May)
        </p>
      </div></div>
      <h3> Backpack pick-up and delivery (August)</h3>
      <ul class="disc">
        <li> BTS Warehouse Duties (August): Help us set-up the warehouse, receive backpacks, sort, quality check, clean-up warehouse and prepare backpacks for distribution to low-income children.</li>
        <li> Backpack distributions (August)</li>
      </ul>
      <h3> Holiday Wish Drive</h3>
      <ul class="disc">
        <li> Wish Card sorting (October)</li>
        <li> Gift pickup and delivery (December)</li>
        <li> HWD warehouse duties (December): Help us set-up warehouse, receive gifts, sort, wrap, quality check, clean-up warehouse and distribute gifts to low-income children.</li>
        <li> Gift distributions (December &amp; January)</li>
      </ul>
      <p> To learn about our needs as soon as they're posted, Sign up for our newsletter <a href="https://www.facebook.com/familygivingtree" target="_blank">become a friend on Facebook</a></p>
      <div class="panel" id="register">
        <h3>When can you volunteer?</h3>
        <div class="inputrow">
          <label for="volunteermonth">Month:</label>
          <select id="volunteermonth">
            <option selected>Select a month</option>
            <option value="january">January</option>
            <option value="february">February</option>
            <option value="march">March</option>
            <option value="april">April</option>
            <option value="may">May</option>
            <option value="june">June</option>
            <option value="july">July</option>
            <option value="august">August</option>
            <option value="september">September</option>
            <option value="october">October</option>
            <option value="november">November</option>
            <option value="december">December</option>
          </select>
        </div>
        <!--
        If a task is available in a specific month, add that month as a class on the li
        For warehouse tasks, add class="warehousetask" in order to show the warehouse task dropdown
        -->
        <ul id="tasklist">
          <li class="january february march april may june july august september october november december"><a href="#" data-reveal-id="volEmailModal">General Office Duties</a> &nbsp;<a href="#" data-reveal-id="task1Modal" class="helpicon">?</a></li>
          <li class="may june"><a href="#" data-reveal-id="volEmailModal">Back to School Drive Prep</a> &nbsp;<a href="#" data-reveal-id="task2Modal" class="helpicon">?</a></li>
          <li class="september october november december"><a href="#" data-reveal-id="volEmailModal">Holiday Wish Drive Prep</a> &nbsp;<a href="#" data-reveal-id="task3Modal" class="helpicon">?</a></li>
          <li class="august"><a href="#" class="warehousetask">Back to School Warehouse</a> &nbsp;<a href="#" data-reveal-id="task4Modal" class="helpicon">?</a></li>
          <li class="january december"><a href="#" class="warehousetask">Holiday Wish Drive Warehouse</a> &nbsp;<a href="#" data-reveal-id="task5Modal" class="helpicon">?</a></li>
          <li class="august december"><a href="#" data-reveal-id="volEmailModal">Donation Pick-ups</a> &nbsp;<a href="#" data-reveal-id="task6Modal" class="helpicon">?</a></li>
          <li class="january february march april may june july august september october november december"><a href="#" data-reveal-id="volEmailModal">Agency Interviews</a> &nbsp;<a href="#" data-reveal-id="task7Modal" class="helpicon">?</a></li>
          <li class="october november"><a href="#" data-reveal-id="volEmailModal">Wish Editing</a> &nbsp;<a href="#" data-reveal-id="task8Modal" class="helpicon">?</a></li>
        </ul>
        <div id="warehousetaskform">
          <div class="inputrow">
            <label>Day/Task:</label>
            
            <!-- Replace below selections with PHP snippet to generate them -->
            
            <select class="volunteerday january">
              <!--
        POPULATE OPTION ATTRIBUTES
        value: Task ID
        disabled: Include if volunteer slot is full
        Text: Day and date
        -->
              <option value="" selected>Select a day and task</option>
              <option value="360">Wed, 7/25/2012 - Warehouse Set UP</option>
              <option value="456">Tues, 7/31/2012 - Warehouse Set UP</option>
              <option value="678" disabled>Wed, 8/1/2012 - Unloading backpacks/Sorting by grade level</option>
              <option value="901" disabled>Thursday, Aug 2, 2012 - QA on Backpack content</option>
            </select>
            
            <select class="volunteerday august">
              <option value="" selected>Select a day and task</option>
              <option value="123">Wed, 7/25/2012 - Warehouse Set UP</option>
              <option value="456">Tues, 7/31/2012 - Warehouse Set UP</option>
              <option value="678" disabled>Wed, 8/1/2012 - Unloading backpacks/Sorting by grade level</option>
              <option value="901" disabled>Thursday, Aug 2, 2012 - QA on Backpack content</option>
            </select>
            
            <select class="volunteerday december">
              <option value="" selected>Select a day and task</option>
              <option value="123">Wed, 7/25/2012 - Warehouse Set UP</option>
              <option value="456">Tues, 7/31/2012 - Warehouse Set UP</option>
              <option value="678" disabled>Wed, 8/1/2012 - Unloading backpacks/Sorting by grade level</option>
              <option value="901" disabled>Thursday, Aug 2, 2012 - QA on Backpack content</option>
            </select>
            &nbsp;
            <a href="#" class="button" data-reveal-id="registerModal" id="registerlink">Go</a>
          </div>
        </div>
      </div>
    </section>
 
    <div class="row">
      <div class="twelve columns">
        <img src="images/horizontal-rule1.png">
      </div>
    </div>

    <section id="warehouse">
      <h2>The Warehouse</h2>
      <div class="row">
        <div class="six column">
          <h3> HWD Warehouse</h3>
          <!--MAP WILL GO HERE-->
          <p> This year the Holiday Wish Drive Warehouse will be located in Cupertino, CA. More information coming soon! </p>
          <p> <strong>HWD Warehouse Wishlist: </strong>We need batteries! If you come to the warehouse or office to volunteer, would you consider bringing batteries (AA, C or D size)? For a complete list of things we need to help keep our programs running, check out our <a href="donate.php#wishlist">Wish List</a>.</p>
        </div>
        <div class="six column">
          <h3> BTS Warehouse</h3>
          <!--GOOGLE MAP-->
          <iframe width="338" height="236" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?oe=utf-8&amp;client=firefox-a&amp;q=560+Cottonwood+Drive+,+Milpitas,+CA&amp;ie=UTF8&amp;hq=&amp;hnear=560+Cottonwood+Dr,+Milpitas,+California+95035&amp;gl=us&amp;t=m&amp;ll=37.403778,-121.913395&amp;spn=0.016091,0.028925&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?oe=utf-8&amp;client=firefox-a&amp;q=560+Cottonwood+Drive+,+Milpitas,+CA&amp;ie=UTF8&amp;hq=&amp;hnear=560+Cottonwood+Dr,+Milpitas,+California+95035&amp;gl=us&amp;t=m&amp;ll=37.403778,-121.913395&amp;spn=0.016091,0.028925&amp;z=14&amp;iwloc=A&amp;source=embed">View Larger Map</a></small>
          <!--END GOOGLE MAP-->
          <p>Thank you iStar Financial!</p>
          <p> 560 Cottonwood Drive <br>
            Milpitas, CA 95035 <br>
          <!--Update hoursCalendar at bottom of page-->
            <a href="#" data-reveal-id="hoursCalendar">Warehouse Hours</a></p>
          BTS Warehouse Wishlist Coming Soon!
          </p>
        </div>
      </div>
      <h3> What you should know before you volunteer</h3>
      <p> <strong>Shift requirements for both drives: </strong>A minimum commitment of two hours is requested for each volunteer shift,  but if we can find more work for you to do on the day you volunteer, we'd love for you to stay! And please, no drop-ins to the warehouse!</p>
      <p> <strong>Warehouse Tasks: </strong>Volunteers will be asked to help in various ways at the warehouse. Usually, these tasks are decided immediately before a group arrives, so we are not able to predict what you or your group will be doing in advance.</p>
      <p> <strong>Attire and Warehouse Conditions:</strong> Always wear multiple layers for warehouse work. We are never sure what temperatures to expect, but it's usually HOT in the summer and COLD in the winter! We also suggest comfy shoes. That’s because we don’t do much sitting.</p>
      <p> <strong>Snacking:</strong> We always have Culligan water available! Snacks and food are available for sale from Gold Rush Catering during the Holiday Wish Drive only.  If you are hosting a group of volunteers, you are welcome to bring your own food and we will set tables up for you.</p>
      <p> <strong>Little Elves:</strong> Little elf volunteers are welcome, but remember the warehouse is not child-proof so younger volunteers must be strictly supervised.</p>
    </section>
    <!--<section id="events">
      <h2>Events</h2>
      <table>
        <tr>
          <td>October 2012</td>
          <td>Details coming soon</td>
        </tr>
      </table>
    </section>-->

    <div class="row">
      <div class="twelve columns">
        <img src="images/horizontal-rule1.png">
      </div>
    </div>

    <section id="angelelf">
      <h2>Angel Elves</h2>
      <p>Do you want to help the Family Giving Tree in a special way? Angel Elves are experienced volunteers willing to donate their time and skill set to help our programs run smoothly. Some Angel Elves supervise other volunteers at the warehouse on multiple days. Some help with special events and other activities such as the Executive Elf Challenge and Wish Card sorting. In the warehouse during Back to School and Holiday Drive, tasks may involve general set up, greeting other volunteers, store supervision and supervision of gift shipping/receiving.  Angel Elf responsibilities depend on the person's experience and comfort level with specific tasks.</p>
      <h3>Who are the Angel Elves?</h3>
      <p>The contributions of our Angel Elves are tremendous. Their combined efforts are vital to our programs and their constant enthusiasm helps brighten the holidays for thousands of children each year. On behalf of all the children, we thank them for their dedication! </p>
      <div class="row">
        <div class="four columns"> <img src="images/people/jessy.png" alt="bio image">
          <h3>Jessy Rodriguez</h3>
          <section><p>Jessy Rodriguez first came to The Family Giving Tree as a volunteer with her young classmates from Calaveras Montessori in 2004. They bagged gifts by 10 and she was already leading her group (she was one of the two children who could count to 10)!
          <!-- .readmorecontent is hidden until the closest .readmore is clicked-->
          <span class="readmorecontent"> For the next several years, Jessy became a regular warehouse volunteer at the Holiday Wish Drive and Back to School Drive. In 2011 she really blossomed and took over the agency pick up job, working some pretty long shifts and even spent time helping her young friends learn the system! Jessy's hard work earned her Angel Elf of the year award in 2011! She currently attends Monroe Middle School where she is on the honor roll, active in band and plays the flute.</span></p>
          <!-- data-hidetext and data-showtext alaternate as the link text on toggle-->
          <p class="text-right"><a href="#" class="readmore" data-hidetext="Show Less" data-showtext="Read More">Read More</a></p></section>
        </div>
        <div class="four columns"> <img src="images/people/joanne.png" alt="bio image">
          <h3>Joanne Bodenhammer</h3>
          <p>Joanne Bodenhammer has volunteered countless hours helping us contact and sign up hundreds of hosts for our holiday program, and get wish cards ready to send them.  Thanks to her dedication and generous spirit for many years, thousands more children's wishes will be fulfilled this season!  She is an amazing Angel Elf!</p>
        </div>
        <div class="four columns"> <img src="images/people/dianne.png" alt="bio image">
          <h3>Diane Trevino</h3>
          <section><p>Diane Trevino has volunteered with FGT since it’s inception, more than 20 years!  She spends endless hours at our warehouses for the Back-to-School Drive and Holiday Wish Drive, doing everything from training fellow volunteers to personally making sure every bag is perfectly packed.  <span class="readmorecontent">Her other commitments include serving as lead volunteer with Sacred Heart Community Services and heading the former National Semiconductor's Holiday Workshop Project that provided 800 gift bags for seniors, low-income families, homeless adults and adults with disabilities. Not only does Diane coordinate the hundreds of volunteers that assemble the gift bags, she and her husband Rey shop for each of the items (over 10,400 toiletries, books, etc.) that go into the bags.  Diane participates in all of the volunteer projects coordinated by Texas Instruments including bagging groceries for seniors at the Sunnyvale Community Services, beautifying an InnVision shelter for women and children, and pulling invasive weeds with Save the Bay.  She also serves on Texas Instrument's Wellness Team, Recycling Team and is a Building Emergency Manager for their headquarters building.  She is an inspiration to all of us!</span></p>
          <p class="text-right"><a href="#" class="readmore" data-hidetext="Show Less" data-showtext="Read More">Read More</a></p></section>
        </div>
      </div>
    </section>

    <div class="row">
      <div class="twelve columns">
        <img src="images/horizontal-rule1.png">
      </div>
    </div>

    <section id="photos">
      <h2>Photos</h2>
      <div class="row">
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="images/volunteer photos/vol1.jpg" class="imgthumb"></a></p>
        </div>
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="images/volunteer photos/vol2.jpg" class="imgthumb"></a></p>
        </div>
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="images/volunteer photos/vol3.jpg" class="imgthumb"></a></p>
        </div>
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="images/volunteer photos/vol4.jpg" class="imgthumb"></a></p>
        </div>
      </div>
      <div class="row">
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="images/volunteer photos/vol5.jpg" class="imgthumb"></a></p>
        </div>
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="images/volunteer photos/vol6.jpg" class="imgthumb"></a></p>
        </div>
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="images/volunteer photos/vol7.jpg" class="imgthumb"></a></p>
        </div>
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="images/volunteer photos/vol8.jpg" class="imgthumb"></a></p>
        </div>
      </div>
      <div class="row">
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="images/volunteer photos/vol9.jpg" class="imgthumb"></a></p>
        </div>
        <div class="three columns end">
          <p><a href="#" data-reveal-id="imgModal"><img src="images/volunteer photos/vol10.jpg" class="imgthumb"></a></p>
        </div>
      </div>
    </section>
  </div>
</div>
<!--Large image modal-->
<div class="reveal-modal" id="imgModal"> <img src="http://placehold.it/300x300" id="largeimage"> <a class="close-reveal-modal">&#215;</a> </div>
<!--Database-driven volunteer registration-->
<div id="registerModal" class="reveal-modal">
  <div id="registerModalContent"></div>
  <a class="close-reveal-modal">&#215;</a> </div>
<!--Task description modals-->
<div id="task1Modal" class="reveal-modal">
  <h2>General Office Duties</h2>
  <p>Help out at the Elves' Office with general office duties such as data input, filing, collateral prep, host calls, and other duties as needed.</p>
  <a class="close-reveal-modal">&#215;</a> </div>
  
<div id="task2Modal" class="reveal-modal">
  <h2>Back to School Drive Prep</h2>
  <p> Help us organize materials and prep collateral for our Back to School Drive. Great for students!</p>
  <a class="close-reveal-modal">&#215;</a> </div>
  
<div id="task3Modal" class="reveal-modal">
  <h2>Holiday Wish Drive Prep</h2>
  <p> Help us organize materials and prep collateral for our Holiday Wish Drive. Great for students!</p>
  <a class="close-reveal-modal">&#215;</a> </div>
  
<div id="task4Modal" class="reveal-modal">
  <h2>Back to School Warehouse</h2>
  <p> Help us set-up the warehouse, receive backpacks, sort supplies, quality check, clean-up and backpack preparation for distribution. </p>
  <a class="close-reveal-modal">&#215;</a> </div>
  
<div id="task5Modal" class="reveal-modal">
  <h2>Holiday Wish Drive Warehouse</h2>
  <p> Help us set-up warehouse, receive gifts, sort and wrap gifts, quality check, clean-up and distribute gifts.</p>
  <a class="close-reveal-modal">&#215;</a> </div>
  
<div id="task6Modal" class="reveal-modal">
  <h2>Donation Pick-ups</h2>
  <p> Help bring backpacks or gifts from our public host companies to our warehouse for preparation and distribution.</p>
  <a class="close-reveal-modal">&#215;</a> </div>
  
<div id="task7Modal" class="reveal-modal">
  <h2>Agency Interviews</h2>
  <p> Make site visits to our agency partners in an effort to evaluate their needs and ensure we stay connected. </p>
  <a class="close-reveal-modal">&#215;</a> </div>
  
<div id="task8Modal" class="reveal-modal">
  <h2>Wish Editing</h2>
  <p> Help us sort through our database of wishes to ensure each child receives exactly what they want!</p>
  <a class="close-reveal-modal">&#215;</a> </div>
<!--Email-based volunteer registration-->
<div id="volEmailModal" class="reveal-modal">
  <!--.preconfirm is hidden after successful submit-->
  <div class="preconfirm">
  <p class="right">
    *Required Fields 
    </p>
  <h2>Register to Volunteer</h2>
  <form id="volunteerform" method="post" action="../../../wamp/www/giving-tree-static/volunteer-post-email.php">
    <label for="name">*Name</label>
    <input type="text" id="name" name="name" class="required" />
    <label for="email">Email Address</label>
    <input type="text" id="email" name="email" />
    <label for="phone">*Phone Number</label>
    <input type="text" id="phone" name="phone" class="required" />
    <label for="org">Company or School Name</label>
    <input type="text" id="org" name="org" />
    <label for="under18">*Are you under 18?</label>
    <div class="inputrow">
    <label>
      <input type="radio" name="under18" id="under18yes" value="Yes" class="required" />
      Yes &nbsp;</label>
    <label>
      <input type="radio" name="under18" id="under18no" value="No" class="required" />
      No &nbsp;</label>
    <label for="grade">If so, grade level</label>
    <input type="text" id="grade" name="grade" />
    </div>
    <div class="inputrow">
    <label for="weekday">*Availability (check all that apply)</label>
    </div>
    <div class="inputrow">
    <label for="weekday">Days</label>
    <label>
      <input type="checkbox" name="weekday[]" id="weekdaym" value="M" class="required" />
      M &nbsp;</label>
    <label>
      <input type="checkbox" name="weekday[]" id="weekdaytu" value="Tu" class="required" />
      Tu &nbsp;</label>
    <label>
      <input type="checkbox" name="weekday[]" id="weekdayw" value="W" class="required" />
      W &nbsp;</label>
    <label>
      <input type="checkbox" name="weekday[]" id="weekdayth" value="Th" class="required" />
      Th &nbsp;</label>
    <label>
      <input type="checkbox" name="weekday[]" id="weekdaym" value="F" class="required" />
      F &nbsp;</label>
    <label>
      <input type="checkbox" name="weekday[]" id="weekdaysat" value="Sat" class="required" />
      Sat &nbsp;</label>
    <label>
      <input type="checkbox" name="weekday[]" id="weekdaysun" value="Sun" class="required" />
      Sun &nbsp;</label>
    </div>
    <div class="inputrow">
    <label for="time">Times</label>
    <label>
      <input type="checkbox" name="time[]" id="timemornings" value="Mornings" />
      Mornings</label>
    <label>
      <input type="checkbox" name="time[]" id="timeafternoons" value="Afternoons" />
      Afternoons</label>
    <label>
      <input type="checkbox" name="time[]" id="timeevenings" value="Evenings" />
      Evenings</label>
    <label>
      <input type="checkbox" name="time[]" id="timeanytime" value="Anytime" />
      Anytime</label>
      </div>
    <label for="purpose">*I am volunteering:</label>
    <label>
    <div class="inputrow">
      <input type="radio" name="purpose" id="purpose_school" value="school" class="required" />
      School requirement &nbsp; (# of hours) <input type="text" id="schoolhrs" name="schoolhrs" /></label>
      </div>
    <div class="inputrow">
    <label>
      <input type="radio" name="purpose" id="purpose_company" value="company" class="required" />
      Company volunteer opportunity</label>
    </div>
    <div class="inputrow">
    (Matching program?
    <label>
      <input type="radio" name="matching" id="matchingyes" value="yes" />
      Yes</label>
    <label>
      <input type="radio" name="matching" id="matchingno" value="no" />
      No</label>)
    </div>
    <div class="inputrow">
    <label>
      <input type="radio" name="purpose" id="purpose_fun" value="fun" class="required" />
      For fun</label>
    </div>
    <div class="inputrow">
    <label>
      <input type="radio" name="purpose" id="purpose_court" value="court" class="required" />
      Court Order</label>
      </div>
    <div class="inputrow">
    <label>
      <input type="radio" name="purpose" id="purpose_other" value="other" class="required" />
      Other</label>
    <input type="text" id="purpose_other" name="purpose_other" />
    </div>
    <label for="skills">Special Skills (i.e. Computer systems, programs, programming, event coordination, etc.)</label>
    <textarea id="skills" name="skills"></textarea>
    <label for="info">Any additional information?</label>
    <textarea id="info" name="info"></textarea>
    <!--Submit sends email to volunteer@familygivingtree.org-->
    <p class="text-center"><a href="#" class="another-reveal-close">Cancel</a> &nbsp; <input type="submit" value="Submit" class="button">
  </form>
  </div>
  <!--Confirmation below-->
  <div class="confirm" style="display:none">
  <h2>Thank you</h2>
  <p>Thank you for your interest in volunteering for  Family Giving Tree. You will be contacted when and if a volunteer match becomes available.</p></div>
  <a class="close-reveal-modal">&#215;</a> </div>
<!--Warehouse task shift details-->
<div id="shiftDetailsModal" class="reveal-modal">
  <h2>Shift Details</h2>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse posuere gravida magna in tristique. </p>
  <p> Nam pretium augue sit amet tortor varius vitae venenatis magna semper. Proin quis erat et massa consectetur feugiat. Morbi sollicitudin mattis ligula, non vehicula est rutrum id. Ut cursus lorem a leo aliquet auctor. </p>
  <p>Suspendisse elit felis, pellentesque sed gravida rutrum, ultrices at erat. Aliquam vel ultricies urna. </p>
  <p>In interdum luctus magna ac tincidunt. Nullam tortor ligula, venenatis ut aliquet in, lobortis eget nisl. </p>
  <p>Ut quis elit mauris, et congue ligula. Mauris vitae tellus non mauris rutrum ultricies a pulvinar nisi. Morbi facilisis dignissim turpis, non aliquet nibh scelerisque ut. Donec quis lacus lectus, in venenatis tellus.</p>
  <a class="close-reveal-modal">&#215;</a> </div>
<!--Warehouse hours-->
<div id="hoursCalendar" class="reveal-modal large"> <a class="close-reveal-modal">&#215;</a>
  <h4>Warehouse Hours: August</h4>
<table class="calendar">
  <thead>
    <tr>
      <th class="weekend">Sunday</th>
      <th>Monday</th>
      <th>Tuesday</th>
      <th>Wednesday</th>
      <th>Thursday</th>
      <th>Friday</th>
      <th class="weekend">Saturday</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="previous weekend"><span class="date">29</span>
        <p>&nbsp;</p>
        <div class="day"></div></td>
      <td class="previous"><span class="date">30</span>
        <p>&nbsp;</p>
        <div class="day"></div></td>
      <td class="previous"><span class="date">31</span>
        <p>&nbsp;</p>
        <div class="day"></div></td>
      <td><span class="date">1</span>
        <p> Backpacks DUE!<br />
          Warehouse Open
          
          10am - 6pm </p>
        <div class="day"></div></td>
      <td><span class="date">2</span>
        <p>Warehouse Open 10am - 5pm</p>
        <div class="day"></div></td>
      <td><span class="date">3</span>
        <p>Warehouse Open 10am - 5pm</p>
        <div class="day"></div></td>
      <td class="weekend"><span class="date">4</span>
        <p>Warehouse Open 11am - 3pmm</p>
        <div class="day"></div></td>
    </tr>
    <tr>
      <td class="weekend"><span class="date">5</span>
        <p>Closed</p>
        <div class="day"></div></td>
      <td><span class="date">6</span>
        <p>Warehouse Open 10am - 5pm</p>
        <div class="day"></div></td>
      <td><span class="date">7</span>
        <p>Warehouse Open 10am - 5pm</p>
        <div class="day"></div></td>
      <td><span class="date">8</span>
        <p>Warehouse Open 10am - 5pm</p>
        <div class="day"></div></td>
      <td><span class="date">9</span>
        <p>Warehouse Open 10am - 5pm</p>
        <div class="day"></div></td>
      <td><span class="date">10</span>
        <p>Warehouse Open 10am - 5pm</p>
        <div class="day"></div></td>
      <td class="weekend"><span class="date">11</span>
        <p>Closed</p>
        <div class="day"></div></td>
    </tr>
    <tr>
      <td class="weekend"><span class="date">12</span>
        <p>Closed</p>
        <div class="day"></div></td>
      <td><span class="date">13</span>
        <p> Backpacks Distributed to Schools <br />
          Warehouse Open 10am - 5pm </p>
        <div class="day"></div></td>
      <td><span class="date">14</span>
        <p>Warehouse Open 10am - 5pm</p>
        <div class="day"></div></td>
      <td><span class="date">15</span>
        <p> School Starts! <br />
          Warehouse Open 10am - 5pm </p>
        <div class="day"></div></td>
      <td><span class="date">16</span>
        <p>Warehouse Open 10am - 5pm</p>
        <div class="day"></div></td>
      <td><span class="date">17</span>
        <p>Warehouse Open 10am - 5pm</p>
        <div class="day"></div></td>
      <td class="weekend"><span class="date">18</span>
        <p>Closed</p>
        <div class="day"></div></td>
    </tr>
    <tr>
      <td class="weekend"><span class="date">19</span>
        <p>Closed</p>
        <div class="day"></div></td>
      <td><span class="date">20</span>
        <p>Warehouse Open 10am - 3pm</p>
        <div class="day"></div></td>
      <td><span class="date">21</span>
        <p>Warehouse Open 10am - 3pm</p>
        <div class="day"></div></td>
      <td><span class="date">22</span>
        <p>&nbsp;</p>
        <div class="day"></div></td>
      <td><span class="date">23</span>
        <p>&nbsp;</p>
        <div class="day"></div></td>
      <td><span class="date">24</span>
        <p>&nbsp;</p>
        <div class="day"></div></td>
      <td class="weekend"><span class="date">25</span>
        <p>&nbsp;</p>
        <div class="day"></div></td>
    </tr>
    <tr>
      <td class="weekend"><span class="date">26</span>
        <p>Closed</p>
        <div class="day"></div></td>
      <td><span class="date">27</span>
        <p>&nbsp;</p>
        <div class="day"></div></td>
      <td><span class="date">28</span>
        <p>&nbsp;</p>
        <div class="day"></div></td>
      <td><span class="date">29</span>
        <p>&nbsp;</p>
        <div class="day"></div></td>
      <td><span class="date">30</span>
        <p>&nbsp;</p>
        <div class="day"></div></td>
      <td><span class="date">31</span>
        <p>&nbsp;</p>
        <div class="day"></div></td>
      <td class="weekend next"><span class="date">1</span>
        <p>&nbsp;</p>
        <div class="day"></div></td>
    </tr>
  </tbody>
</table>
</div>

<?php include("includes/_footer.php");  ?>
<script src="javascripts/jquery.form.js"></script>

<!--For form validation-->
<script src="javascripts/jquery.validate.min.js"></script>

<script>
$(document).ready(function(){
  registerSelect();
  readMoreToggle();
  imagePopup();
  $('#volunteerform').validate();
  $('#volunteerform').ajaxForm({success: function(response){
    $('.preconfirm').hide();
    $('.confirm').show();
  }})
});
<!--FOR THE REGISTRATION FORM-->
function registerSelect(){
  $('#registerlink').hide();
  $('#warehousetaskform').hide();
  $('.volunteerday').hide();
  $('.warehousetask').click(function(e){
    e.preventDefault();
    $('#warehousetaskform').show();
  });
  $('#tasklist li').hide();
  $('#volunteermonth').val(jQuery('options:first', this).val())
  $('#volunteermonth').change(function(){
    var month = $(this).val();
    $('#tasklist li').hide();
    $('.'+month).show();
  });
  $('.volunteerday').change(function(){
    $('#registerlink').hide();
    var taskId = $(this).val();
    var desc = $(this).find('option:selected').text();
  if(taskId!==''){
      $('#registerlink').show();
      $('#registerModalContent').load('vol_register.php?taskId='+taskId);
      $('#daytask').text(desc);
  }
  });
  $("div.reveal-modal").delegate(".another-reveal-close", "click", function(e) {
    e.preventDefault();
    $(this).parents("div.reveal-modal").trigger('reveal:close');
  });
}
<!--Image popup-->
function imagePopup(){
  $('.imgthumb').click(function(){
    $('#largeimage').attr('src',$(this).attr('src'));
  });
}
<!--FOR THE READ MORE TOGGLE-->
function readMoreToggle(){
  $('.readmorecontent').hide();
  $('.readmore').toggle(function(){
    $(this).text($(this).attr('data-hidetext'))
    .closest('section').find('.readmorecontent').show('blind');
  },function(){
    $(this).text($(this).attr('data-showtext'))
    .closest('section').find('.readmorecontent').hide('blind');
  });
}
</script>