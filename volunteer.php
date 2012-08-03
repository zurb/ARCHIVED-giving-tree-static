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
    <ul class="side-nav">
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
      <h4> Year-Round Volunteer Opportunities</h4>
      <ul>
        <li> General Office Help & Drive Preparation: Help us organize materials and prep for our Back to School Drive and/or Holiday Wish Drive. Great for students! </li>
        <li> *Please, no drop-ins. Email volunteers@familygivingtree.org or call
          
          (408) 946-3111 first. </li>
        <li> Back to School Drive :</li>
        <li> Backpack Card sorting (May)</li>
      </ul>
      <h4> Backpack pick-up and delivery (August)</h4>
      <ul>
        <li> BTS Warehouse Duties (August): Help us set-up the warehouse, receive backpacks, sort, quality check, clean-up warehouse and prepare backpacks for distribution to low-income children.</li>
        <li> Backpack distributions (August)</li>
      </ul>
      <h4> Holiday Wish Drive:</h4>
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
          <li class="january february may june august november december"><a href="#" data-reveal-id="volEmailModal">General Office Duties</a> &nbsp; <a href="#" data-reveal-id="task1Modal">?</a></li>
          <li class="march april july september october december"><a href="#" data-reveal-id="volEmailModal">Back to School Drive Prep</a> &nbsp; <a href="#" data-reveal-id="task2Modal">?</a></li>
          <li class="january march june july september november december"><a href="#" data-reveal-id="volEmailModal">Holiday Wish Drive Prep</a> &nbsp; <a href="#" data-reveal-id="task3Modal">?</a></li>
          <li class="january february may june august november december"><a href="#" data-reveal-id="volEmailModal">Back to School Warehouse</a> &nbsp; <a href="#" data-reveal-id="task4Modal">?</a></li>
          <li class="january february may june august november december"><a href="#" class="warehousetask">Holiday Wish Drive Warehouse</a> &nbsp; <a href="#" data-reveal-id="task5Modal">?</a></li>
          
          <li class="january february may june august november december"><a href="#" class="warehousetask">Holiday Wish Drive Warehouse</a> &nbsp; <a href="#" data-reveal-id="task5Modal">?</a></li>
          <li class="january february may june august november december"><a href="#" class="warehousetask">Holiday Wish Drive Warehouse</a> &nbsp; <a href="#" data-reveal-id="task5Modal">?</a></li>
          <li class="january february may june august november december"><a href="#" class="warehousetask">Holiday Wish Drive Warehouse</a> &nbsp; <a href="#" data-reveal-id="task5Modal">?</a></li>
        </ul>
        <div id="warehousetaskform">
          <p>
            <label for="volunteerday">Day/Task:</label>
            <select id="volunteerday">
              <!--
        POPULATE OPTION ATTRIBUTES
        value: Task Name
        data-taskid: Task ID
        disabled: Include if volunteer slot is full
        Text: Day and date
        -->
              <option selected>Select a day and task</option>
              <option value="123">Wed, 7/25/2012 - Warehouse Set UP</option>
              <option value="456">Tues, 7/31/2012 - Warehouse Set UP</option>
              <option value="678" data-taskid="456" disabled>Wed, 8/1/2012 - Unloading backpacks/Sorting by grade level</option>
              <option value="901" data-taskid="456" disabled>Thursday, Aug 2, 2012 - QA on Backpack content</option>
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
      <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse posuere gravida magna in tristique. Nam pretium augue sit amet tortor varius vitae venenatis magna semper. Proin quis erat et massa consectetur feugiat. Morbi sollicitudin mattis ligula, non vehicula est rutrum id. Ut cursus lorem a leo aliquet auctor. Suspendisse elit felis, pellentesque sed gravida rutrum, ultrices at erat. Aliquam vel ultricies urna. In interdum luctus magna ac tincidunt. Nullam tortor ligula, venenatis ut aliquet in, lobortis eget nisl. Ut quis elit mauris, et congue ligula. Mauris vitae tellus non mauris rutrum ultricies a pulvinar nisi. Morbi facilisis dignissim turpis, non aliquet nibh scelerisque ut. Donec quis lacus lectus, in venenatis tellus.</p>
      <div class="row">
        <div class="four columns"> <img src="http://placehold.it/300x300" alt="bio image">
          <h3>Joe Shmoe</h3>
          <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod. Sed posuere consectetur est at lobortis. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
        </div>
        <div class="four columns"> <img src="http://placehold.it/300x300" alt="bio image">
          <h3>Joe Shmoe</h3>
          <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod. Sed posuere consectetur est at lobortis. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
        </div>
        <div class="four columns"> <img src="http://placehold.it/300x300" alt="bio image">
          <h3>Joe Shmoe</h3>
          <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod. Sed posuere consectetur est at lobortis. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
        </div>
      </div>
      <div class="row">
        <div class="four columns"> <img src="http://placehold.it/300x300" alt="bio image">
          <h3>Joe Shmoe</h3>
          <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod. Sed posuere consectetur est at lobortis. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
        </div>
        <div class="four columns"> <img src="http://placehold.it/300x300" alt="bio image">
          <h3>Joe Shmoe</h3>
          <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod. Sed posuere consectetur est at lobortis. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
        </div>
        <div class="four columns"> <img src="http://placehold.it/300x300" alt="bio image">
          <h3>Joe Shmoe</h3>
          <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod. Sed posuere consectetur est at lobortis. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
        </div>
      </div>
      <div class="row">
        <div class="four columns"> <img src="http://placehold.it/300x300" alt="bio image">
          <h3>Joe Shmoe</h3>
          <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod. Sed posuere consectetur est at lobortis. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
        </div>
        <div class="four columns"> <img src="http://placehold.it/300x300" alt="bio image">
          <h3>Joe Shmoe</h3>
          <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod. Sed posuere consectetur est at lobortis. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
        </div>
        <div class="four columns"> <img src="http://placehold.it/300x300" alt="bio image">
          <h3>Joe Shmoe</h3>
          <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod. Sed posuere consectetur est at lobortis. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
        </div>
      </div>
      <div class="row">
        <div class="four columns"> <img src="http://placehold.it/300x300" alt="bio image">
          <h3>Joe Shmoe</h3>
          <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod. Sed posuere consectetur est at lobortis. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
        </div>
        <div class="four columns"> <img src="http://placehold.it/300x300" alt="bio image">
          <h3>Joe Shmoe</h3>
          <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod. Sed posuere consectetur est at lobortis. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
        </div>
        <div class="four columns"> <img src="http://placehold.it/300x300" alt="bio image">
          <h3>Joe Shmoe</h3>
          <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod. Sed posuere consectetur est at lobortis. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
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
  <div id="registerModalContent"> 
    <!--vol_register.php is loaded here, with taskId parameter--> 
  </div>
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
  </div>
<div id="volEmailModal" class="reveal-modal">
  <h2>Register to Volunteer</h2>
  <p class="lead">Your couch. I it's mine.</p>
  <p>Im a cool paragraph that lives inside of an even cooler modal. Wins</p>
  <a class="close-reveal-modal">&#215;</a> </div>
<div id="shiftDetailsModal" class="reveal-modal">
  <h2>Shift Details</h2>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse posuere gravida magna in tristique. </p>
  <p> Nam pretium augue sit amet tortor varius vitae venenatis magna semper. Proin quis erat et massa consectetur feugiat. Morbi sollicitudin mattis ligula, non vehicula est rutrum id. Ut cursus lorem a leo aliquet auctor. </p>
  <p>Suspendisse elit felis, pellentesque sed gravida rutrum, ultrices at erat. Aliquam vel ultricies urna. </p>
  <p>In interdum luctus magna ac tincidunt. Nullam tortor ligula, venenatis ut aliquet in, lobortis eget nisl. </p>
  <p>Ut quis elit mauris, et congue ligula. Mauris vitae tellus non mauris rutrum ultricies a pulvinar nisi. Morbi facilisis dignissim turpis, non aliquet nibh scelerisque ut. Donec quis lacus lectus, in venenatis tellus.</p>
  <a class="close-reveal-modal">&#215;</a> </div>
<div id="hoursCalendar" class="reveal-modal">
  <a class="close-reveal-modal">&#215;</a>
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
  $('#volunteerday').change(function(){
    var taskId = $(this).val();
    $('#registerlink').show();
    $('#registerModalContent').load('vol_register.php?taskName='+taskId,function(){
    });
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