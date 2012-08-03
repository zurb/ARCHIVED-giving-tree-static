<?
  $page_title = "Volunteer" ;
  $page_template = "main";  
?>
<?php include("includes/_header.php"); ?>

<!-- VOLUNTEER PAGE CONTENT -->
<div class="row">
  <div class="twelve column"> <img src="http://placehold.it/1000x350">
    <h1>Volunteer</h1>
  </div>
</div>
<div class="row">
  <div class="three column">
    <ul class="side-nav" data-sticky>
      <li><a href="#joinus">Join Us</a></li>
      <li><a href="#register">Register</a></li>
      <li><a href="#warehouse">The Warehouse</a></li>
      <li><a href="#events">Events</a>
      <li><a href="#angelelf">Angel Elves</a></li>
      <li><a href="#celebrating">Celebrating Volunteers</a></li>
      <li><a href="#photos">Photos</a></li>
    </ul>
  </div>
  <div class="nine column">
    <section id="joinus">
      <h2>Join Us</h2>
      <p>Become an elf! The Family Giving Tree depends almost entirely on our volunteers to perform the tasks necessary to ensure all wishes are fulfilled. If you'd like to help, check out what we have to offer:</p>
      <h3> Year-Round Volunteer Opportunities</h3>
      <ul>
        <li> General Office Help & Drive Preparation: Help us organize materials and prep for our Back to School Drive and/or Holiday Wish Drive. Great for students! </li>
        <li> *Please, no drop-ins. Email volunteers@familygivingtree.org or call
          
          (408) 946-3111 first. </li>
        <li> Back to School Drive :</li>
        <li> Backpack Card sorting (May)</li>
      </ul>
      <h3> Backpack pick-up and delivery (August)</h3>
      <ul>
        <li> BTS Warehouse Duties (August): Help us set-up the warehouse, receive backpacks, sort, quality check, clean-up warehouse and prepare backpacks for distribution to low-income children.</li>
        <li> Backpack distributions (August)</li>
      </ul>
      <h3> Holiday Wish Drive:</h3>
      <ul>
        <li> Wish Card sorting (October)</li>
        <li> Gift pickup and delivery (December)</li>
        <li> HWD warehouse duties (December): Help us set-up warehouse, receive gifts, sort, wrap, quality check, clean-up warehouse and distribute gifts to low-income children.</li>
        <li> Gift distributions (December & January)</li>
      </ul>
      <p> To learn about our needs as soon as they're posted, Sign up for our newsletter <a href="#">become a friend on Facebook</a></p>
      <div class="panel" id="register">
        <h4>When can you volunteer?</h4>
        <p>
          <label for="volunteermonth">Month:</label>
          <select id="volunteermonth">
            <!--
        POPULATE OPTION ATTRIBUTES
        value: Task Name
        data-taskid: Task ID
        disabled: Include if volunteer slot is full
        Text: Day and date
        -->
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
        </p>
        <ul id="tasklist">
          <li class="january february march april may june july august september october november december"><a href="#" data-reveal-id="volEmailModal">General Office Duties</a> &nbsp; <a href="#" data-reveal-id="task1Modal">?</a></li>
          <li class="may june"><a href="#" data-reveal-id="volEmailModal">Back to School Drive Prep</a> &nbsp; <a href="#" data-reveal-id="task2Modal">?</a></li>
          <li class="september october november december"><a href="#" data-reveal-id="volEmailModal">Holiday Wish Drive Prep</a> &nbsp; <a href="#" data-reveal-id="task3Modal">?</a></li>
          <li class="august"><a href="#" class="warehousetask">Back to School Warehouse</a> &nbsp; <a href="#" data-reveal-id="task4Modal">?</a></li>
          <li class="january december"><a href="#" class="warehousetask">Holiday Wish Drive Warehouse</a> &nbsp; <a href="#" data-reveal-id="task5Modal">?</a></li>
          <li class="august december"><a href="#" data-reveal-id="volEmailModal">Donation Pick-ups</a> &nbsp; <a href="#" data-reveal-id="task6Modal">?</a></li>
          <li class="february march april may june july september november"><a href="#" data-reveal-id="volEmailModal">Agency Interviews</a> &nbsp; <a href="#" data-reveal-id="task7Modal">?</a></li>
          <li class="october november"><a href="#" data-reveal-id="volEmailModal">Wish Editing</a> &nbsp; <a href="#" data-reveal-id="task8Modal">?</a></li>
        </ul>
        <div id="warehousetaskform">
          <p>
            <label>Day/Task:</label>
            <select class="volunteerday january">
              <!--
        POPULATE OPTION ATTRIBUTES
        value: Task ID
        disabled: Include if volunteer slot is full
        Text: Day and date
        -->
              <option selected>Select a day and task</option>
              <option value="123">Wed, 7/25/2012 - Warehouse Set UP</option>
              <option value="456">Tues, 7/31/2012 - Warehouse Set UP</option>
              <option value="678" disabled>Wed, 8/1/2012 - Unloading backpacks/Sorting by grade level</option>
              <option value="901" disabled>Thursday, Aug 2, 2012 - QA on Backpack content</option>
            </select>
            <select class="volunteerday august">
              <!--
        POPULATE OPTION ATTRIBUTES
        value: Task ID
        disabled: Include if volunteer slot is full
        Text: Day and date
        -->
              <option selected>Select a day and task</option>
              <option value="123">Wed, 7/25/2012 - Warehouse Set UP</option>
              <option value="456">Tues, 7/31/2012 - Warehouse Set UP</option>
              <option value="678" disabled>Wed, 8/1/2012 - Unloading backpacks/Sorting by grade level</option>
              <option value="901" disabled>Thursday, Aug 2, 2012 - QA on Backpack content</option>
            </select>
            <select class="volunteerday december">
              <!--
        POPULATE OPTION ATTRIBUTES
        value: Task ID
        disabled: Include if volunteer slot is full
        Text: Day and date
        -->
              <option selected>Select a day and task</option>
              <option value="123">Wed, 7/25/2012 - Warehouse Set UP</option>
              <option value="456">Tues, 7/31/2012 - Warehouse Set UP</option>
              <option value="678" disabled>Wed, 8/1/2012 - Unloading backpacks/Sorting by grade level</option>
              <option value="901" disabled>Thursday, Aug 2, 2012 - QA on Backpack content</option>
            </select>
          </p>
          <p> <a href="#" class="button" data-reveal-id="registerModal" id="registerlink">Go</a></p>
        </div>
      </div>
    </section>
    <section id="warehouse">
      <h2>The Warehouse</h2>
      <div class="row">
        <div class="six column">
          <h3> HWD Warehouse</h3>
          <!--MAP WILL GO HERE-->
          <p> This year the Holiday Wish Drive Warehouse will be located in Cupertino, CA. More information coming soon! </p>
          <p> <strong>HWD Warehouse Wishlist: </strong>We need batteries! If you come to the warehouse or office to volunteer, would you consider bringing batteries (AA, C or D size)? For a complete list of things we need to help keep our programs running, check out our <a href="#">Wish List</a>.</p>
        </div>
        <div class="six column">
          <h3> BTS Warehouse</h3>
          <img src="http://placehold.it/500x350">
          <p>Thank you iStar Financial!</p>
          <p> 560 Cottonwood Drive <br>
            Milpitas, CA 95035 <br>
            <a href="#" data-reveal-id="hoursCalendar">Warehouse Hours</a></p>
          <link>
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
    <section id="events">
      <h2>Events</h2>
      <table>
        <tr>
          <td>XX/XX/XXXX</td>
          <td>Lorem ipsum lorem ipsum lorem ipsum</td>
          <td><a href="#">More Info &raquo;</a></td>
        </tr>
        <tr>
          <td>XX/XX/XXXX</td>
          <td>Lorem ipsum lorem ipsum lorem ipsum</td>
          <td><a href="#">More Info &raquo;</a></td>
        </tr>
        <tr>
          <td>XX/XX/XXXX</td>
          <td>Lorem ipsum lorem ipsum lorem ipsum</td>
          <td><a href="#">More Info &raquo;</a></td>
        </tr>
        <tr>
          <td>XX/XX/XXXX</td>
          <td>Lorem ipsum lorem ipsum lorem ipsum</td>
          <td><a href="#">More Info &raquo;</a></td>
        </tr>
        <tr>
          <td>XX/XX/XXXX</td>
          <td>Lorem ipsum lorem ipsum lorem ipsum</td>
          <td><a href="#">More Info &raquo;</a></td>
        </tr>
      </table>
    </section>
    <section id="angelelf">
      <h2>Angel Elves</h2>
      <p>Do you want to help the Family Giving Tree in a special way? Angel Elves are experienced volunteers willing to donate their time and skill set to help our programs run smoothly. Some Angel Elves supervise other volunteers at the warehouse on multiple days. Some help with special events and other activities such as the Executive Elf Challenge and Wish Card sorting. In the warehouse during Back to School and Holiday Drive, tasks may involve general set up, greeting other volunteers, store supervision and supervision of gift shipping/receiving.  Angel Elf responsibilities depend on the person's experience and comfort level with specific tasks.</p>
    </section>
    <section id="celebrating">
      <h2>Celebrating Volunteers</h2>
      <h3>Who are the Angel Elves?</h3>
      <p>The contributions of our Angel Elves are tremendous. Their combined efforts are vital to our programs and their constant enthusiasm helps brighten the holidays for thousands of children each year. On behalf of all the children, we thank them for their dedication! </p>
      <div class="row">
        <div class="four columns"> <img src="http://placehold.it/300x300" alt="bio image">
          <h3>Jessy Rodriguez</h3>
          <p>Jessy Rodriguez first came to The Family Giving Tree as a volunteer with her young classmates from Calaveras Montessori in 2004. They bagged gifts by 10 and she was already leading her group (she was one of the two children who could count to 10)!
          <span class="readmorecontent"> For the next several years, Jessy became a regular warehouse volunteer at the Holiday Wish Drive and Back to School Drive. In 2011 she really blossomed and took over the agency pick up job, working some pretty long shifts and even spent time helping her young friends learn the system! Jessy's hard work earned her Angel Elf of the year award in 2011! She currently attends Monroe Middle School where she is on the honor roll, active in band and plays the flute.</span></p>
          <p class="text-right"><a href="#" class="readmore" data-hidetext="Show Less" data-showtext="Read More">Read More</a></p>
        </div>
        <div class="four columns"> <img src="http://placehold.it/300x300" alt="bio image">
          <h3>Joanne Bodenhammer</h3>
          <p>Joanne Bodenhammer has volunteered countless hours helping us contact and sign up hundreds of hosts for our holiday program, and get wish cards ready to send them.  Thanks to her dedication and generous spirit for many years, thousands more children's wishes will be fulfilled this season!  She is an amazing Angel Elf!</p>
        </div>
        <div class="four columns"> <img src="http://placehold.it/300x300" alt="bio image">
          <h3>Diane Trevino</h3>
          <p>Diane Trevino has volunteered with FGT since it’s inception, more than 20 years!  She spends endless hours at our warehouses for the Back-to-School Drive and Holiday Wish Drive, doing everything from training fellow volunteers to personally making sure every bag is perfectly packed.  Her other commitments include serving as lead volunteer with Sacred Heart Community Services and heading the former National Semiconductor's Holiday Workshop Project that provided 800 gift bags for seniors, low-income families, homeless adults and adults with disabilities. <span class="readmorecontent">Not only does Diane coordinate the hundreds of volunteers that assemble the gift bags, she and her husband Rey shop for each of the items (over 10,400 toiletries, books, etc.) that go into the bags.  Diane participates in all of the volunteer projects coordinated by Texas Instruments including bagging groceries for seniors at the Sunnyvale Community Services, beautifying an InnVision shelter for women and children, and pulling invasive weeds with Save the Bay.  She also serves on Texas Instrument's Wellness Team, Recycling Team and is a Building Emergency Manager for their headquarters building.  She is an inspiration to all of us!</span></p>
          <p class="text-right"><a href="#" class="readmore" data-hidetext="Show Less" data-showtext="Read More">Read More</a></p>
        </div>
      </div>
    </section>
    <section id="photos">
      <h2>Photos</h2>
      <div class="row">
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="http://placehold.it/300x300"></a></p>
        </div>
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="http://placehold.it/300x300"></a></p>
        </div>
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="http://placehold.it/300x300"></a></p>
        </div>
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="http://placehold.it/300x300"></a></p>
        </div>
      </div>
      <div class="row">
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="http://placehold.it/300x300"></a></p>
        </div>
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="http://placehold.it/300x300"></a></p>
        </div>
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="http://placehold.it/300x300"></a></p>
        </div>
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="http://placehold.it/300x300"></a></p>
        </div>
      </div>
      <div class="row">
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="http://placehold.it/300x300"></a></p>
        </div>
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="http://placehold.it/300x300"></a></p>
        </div>
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="http://placehold.it/300x300"></a></p>
        </div>
        <div class="three columns">
          <p><a href="#" data-reveal-id="imgModal"><img src="http://placehold.it/300x300"></a></p>
        </div>
      </div>
    </section>
  </div>
</div>
<div class="reveal-modal" id="imgModal"> <img src="http://placehold.it/300x300"> <a class="close-reveal-modal">&#215;</a> </div>
<div id="registerModal" class="reveal-modal">
  <h2>Register to Volunteer</h2>
  <p><strong>Day/Task:</strong> <span id="daytask"></span> </p>
  <form action="" id="warehouseform">
    <!--Hidden input with taskId value is added with script-->
    <p>
      <label for="name">Name</label>
      <input type="text" id="name">
    </p>
    <p>
      <label for="email">Email</label>
      <input type="text" id="email">
    </p>
    <p>
      <label for="emailconfirm">Confirm Email</label>
      <input type="text" id="emailconfirm">
    </p>
    <p>
      <label for="phone">Phone Number</label>
      <input type="text" id="phone">
    </p>
    <p>
      <label for="phone">Group/Company Name</label>
      <input type="text" id="group">
    </p>
    <p>
      <label for="phone">Numver of Volunteers</label>
      <input type="text" id="number">
    </p>
    <p class="text-center"> <a href="#">Cancel</a> &nbsp;
      <input type="submit" value="Submit" class="button">
    </p>
  </form>
  <a class="close-reveal-modal">&#215;</a> </div>
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
<div id="volEmailModal" class="reveal-modal">
  <h2>Register to Volunteer</h2>
  <form id="volunteerform">
    <label for="name">*Name</label>
    <input type="text" id="name">
    <label for="email">Email Address</label>
    <input type="text" id="email">
    <label for="phone">*Phone Number</label>
    <input type="text" id="phone">
    <label for="org">Company or School Name</label>
    <input type="text" id="org">
    <label for="under18">*Are you under 18?</label>
    <label>
      <input type="radio" name="under18" id="under18yes">
      Yes</label>
    <label>
      <input type="radio" name="under18" id="under18no">
      No</label>
    <label for="grade">If so, grade level</label>
    <input type="text" id="grade">
    <label for="weekday">*Availability (check all that apply)</label>
    Days
    <label>
      <input type="checkbox" name="weekday" id="weekdaym">
      M</label>
    <label>
      <input type="checkbox" name="weekday" id="weekdaytu">
      Tu</label>
    <label>
      <input type="checkbox" name="weekday" id="weekdayw">
      W</label>
    <label>
      <input type="checkbox" name="weekday" id="weekdayth">
      Th</label>
    <label>
      <input type="checkbox" name="weekday" id="weekdaym">
      F</label>
    <label>
      <input type="checkbox" name="weekday" id="weekdaysat">
      Sat</label>
    <label>
      <input type="checkbox" name="weekday" id="weekdaysun">
      Sun</label>
    <label for="time">Times</label>
    <label>
      <input type="checkbox" name="time" id="timemornings">
      Mornings</label>
    <label>
      <input type="checkbox" name="time" id="timeafternoons">
      Afternoons</label>
    <label>
      <input type="checkbox" name="time" id="timeevenings">
      Evenings</label>
    <label>
      <input type="checkbox" name="time" id="timeanytime">
      Anytime</label>
    <label for="purpose">*I am volunteering:</label>
    <label>
      <input type="radio" name="purpose" id="purpose_school">
      School requirement</label>
    (# of hours
    <input type="text" id="schoolhrs">
    )
    <label>
      <input type="radio" name="purpose" id="purpose_company">
      Company volunteer opportunity</label>
    (Matching program?
    <label>
      <input type="radio" name="matching" id="matchingyes">
      Yes</label>
    <label>
      <input type="radio" name="matching" id="matchingno">
      No</label>
    )
    <label>
      <input type="radio" name="purpose" id="purpose_fun">
      For fun</label>
    <label>
      <input type="radio" name="purpose" id="purpose_court">
      Court Order</label>
    <label>
      <input type="radio" name="purpose" id="purpose_fun">
      Other</label>
    <input type="text" id="purpose_other">
    <label for="skills">Special Skills (i.e. Computer systems, programs, programming, event coordination, etc.)</label>
    <textarea id="skills"></textarea>
    <label for="info">Any additional information?</label>
    <textarea id="info"></textarea>
    *Required Fields 
    <!--Submit sends email to volunteer@familygivingtree.org-->
    <input type="submit" value="Submit" class="button">
  </form>
  <!--Confirmation below-->
  <p style="display:none">Thank you for your interest in volunteering for  Family Giving Tree. You will be contacted when and if a volunteer match becomes available.</p>
  <a class="close-reveal-modal">&#215;</a> </div>
<div id="shiftDetailsModal" class="reveal-modal">
  <h2>Shift Details</h2>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse posuere gravida magna in tristique. </p>
  <p> Nam pretium augue sit amet tortor varius vitae venenatis magna semper. Proin quis erat et massa consectetur feugiat. Morbi sollicitudin mattis ligula, non vehicula est rutrum id. Ut cursus lorem a leo aliquet auctor. </p>
  <p>Suspendisse elit felis, pellentesque sed gravida rutrum, ultrices at erat. Aliquam vel ultricies urna. </p>
  <p>In interdum luctus magna ac tincidunt. Nullam tortor ligula, venenatis ut aliquet in, lobortis eget nisl. </p>
  <p>Ut quis elit mauris, et congue ligula. Mauris vitae tellus non mauris rutrum ultricies a pulvinar nisi. Morbi facilisis dignissim turpis, non aliquet nibh scelerisque ut. Donec quis lacus lectus, in venenatis tellus.</p>
  <a class="close-reveal-modal">&#215;</a> </div>
<div id="hoursCalendar" class="reveal-modal"> <a class="close-reveal-modal">&#215;</a>
  <h4>Warehouse Hours: August</h4>
  <table id="month">
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
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td class="previous"><span class="date">30</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td class="previous"><span class="date">31</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">1</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">2</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">3</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td class="weekend"><span class="date">4</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
      </tr>
      <tr>
        <td class="weekend"><span class="date">5</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">6</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">7</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">8</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">9</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">10</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td class="weekend"><span class="date">11</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
      </tr>
      <tr>
        <td class="weekend"><span class="date">12</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">13</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">14</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">15</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">16</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">17</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td class="weekend"><span class="date">18</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
      </tr>
      <tr>
        <td class="weekend"><span class="date">19</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">20</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">21</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">22</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">23</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">24</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td class="weekend"><span class="date">25</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
      </tr>
      <tr>
        <td class="weekend"><span class="date">26</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">27</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">28</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">29</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">30</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td><span class="date">31</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
        <td class="weekend next"><span class="date">1</span>
          <p>Lorem ipsum lorem ipsum</p>
          <div class="day"></div></td>
      </tr>
    </tbody>
  </table>
</div>


<?php include("includes/_footer.php");  ?>
<script>
$(document).ready(function(){
  registerSelect();
  readMoreToggle();
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
    var taskId = $(this).val();
  var desc = $(this).find('option:selected').text();
    $('#registerlink').show();
  $('#warehouseform').append('<input type="hidden" name="TaskId" value="'+taskId+'">');
    $('#daytask').text(desc);
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