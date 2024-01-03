<?php require('./includes/header.php'); ?>
<section class="schedule_1">
  <div class="container-fluid p-0 m-0">
    <div class="row m-0">
      <div class="col-md-8 p-0 m-0">
        <div class="text_area">
          <div class="heading">
            <h1>Schedule Interview</h1>
            <p>Welcome to the interview scheduling portal. Please follow the steps below to select your interview dates and fill in all the required information.</p>
          </div>
          <div class="box">
            <p>Is this interview ready to be scheduled? Please indicate your confirmation.</p>
            <div class="btn-box">
              <button>YES</button>
              <button>NO</button>
            </div>
          </div>
          <form class="interview_form" id="interview_form">
            <div class="box">
              <p>Enter the unique confirmation code you received in your email, post Application:</p>
              <input type="text" name="unique_id" placeholder="Enter Code here">
            </div>
            <div class="box">
              <p>When do you want your interview to be conducted? Select a date</p>
              <input type="date" name="date" value="" id="date" style="opacity: 0;">
              <div class="date-time-box">
                <div class="date">
                  <div class="wrapper">
                    <header>
                      <div class="icons">
                        <span id="prev" class="material-symbols-rounded"> < </span>
                      </div>
                      <p class="current-date" id="selected-date-display"></p>
                      <div class="icons">
                        <span id="next" class="material-symbols-rounded"> > </span>
                      </div>
                    </header>
                    <div class="calendar">
                      <ul class="weeks">
                        <li>Sun</li>
                        <li>Mon</li>
                        <li>Tue</li>
                        <li>Wed</li>
                        <li>Thu</li>
                        <li>Fri</li>
                        <li>Sat</li>
                      </ul>
                      <ul class="days"></ul>
                    </div>
                  </div>
                </div>
                <div class="time">
                  <p>Schedule at ( Time )</p>
                  <div class="time_box">
                    <label class="radio_box">
                      <input type="radio" name="time" value="9:30 AM">
                      <span>9:30 AM</span>
                    </label>
                    <label class="radio_box">
                      <input type="radio" name="time" value="11:20 AM">
                      <span>11:30 AM</span>
                    </label>
                    <label class="radio_box">
                      <input type="radio" name="time" value="3:00 PM">
                      <span>3:00 PM</span>
                    </label>
                    <label class="radio_box">
                      <input type="radio" name="time" value="6:30 PM">
                      <span>6:30 PM</span>
                    </label>
                  </div>
                  <label id="time-error" class="error error-message" for="time"></label>
                </div>
              </div>
            </div>
            <div class="box">
              <input type="text" name="name" placeholder="Full Name">
              <label id="name-error" class="error error-message" for="name"></label>

              <input type="email" name="email" placeholder="E-mail Address">
              <label id="email-error" class="error error-message" for="email"></label>


              <input type="text" name="phone" placeholder="Phone Number">
              <label id="phone-error" class="error error-message" for="phone"></label>


              <select name="position">
                <option value="">Select the position that you applied for</option>
                <option value="1">Intern</option>
                <option value="2">executive</option>
                <option value="3">Other</option>
              </select>
              <label id="position-error" class="error error-message" for="position"></label>


              <textarea name="message" cols="30" rows="5" placeholder="Additional Comments"></textarea>
              <label id="message-error" class="error error-message" for="message"></label>

            </div>
            <div class="box">
              <p>Review your selections and information. Click the "Submit" button to confirm your interview schedule.</p>
              <button type="submit" id="submitBtn" name="submit" class="s_btn">Schedule</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-4 p-0 m-0">
        <div class="img_area">
          <img src="./assets/images/schedule_1.png" alt="">
          <img src="./assets/images/schedule_2.png" alt="">
          <img src="./assets/images/schedule_3.png" alt="">
          <img src="./assets/images/schedule_4.png" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<?php require('./includes/footer.php'); ?>
<?php require('./includes/script.php'); ?>
<script>
  const daysTag = document.querySelector(".days");
  const currentDate = document.querySelector(".current-date");
  const prevNextIcon = document.querySelectorAll(".icons span");
  const selectedDateDisplay = document.getElementById("selected-date-display");
  const dateInput = document.getElementById("date");

  let date = new Date();
  let currYear = date.getFullYear();
  let currMonth = date.getMonth();

  const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];

  // Function to remove the 'active' class from the current date
  function clearActiveClass() {
    const currentDateElement = document.querySelector(".active");
    if (currentDateElement) {
      currentDateElement.classList.remove("active");
    }
  }

  // Function to navigate to a specific month and keep the selected date
  function goToMonth(month, year) {
    currMonth = month;
    currYear = year;
    renderCalendar();
  }

  // Function to render the calendar
  const renderCalendar = () => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay();
    let lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate();
    let lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay();
    let lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate();
    let liTag = "";

    for (let i = firstDayofMonth; i > 0; i--) {
      liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
    }

    for (let i = 1; i <= lastDateofMonth; i++) {
      let isToday =
        i === date.getDate() &&
        currMonth === date.getMonth() &&
        currYear === date.getFullYear() ?
        "active" :
        "";
      liTag += `<li class="${isToday}">${i}</li>`;
    }

    for (let i = lastDayofMonth; i < 6; i++) {
      liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`;
    }
    currentDate.innerText = `${months[currMonth]} ${currYear}`;
    daysTag.innerHTML = liTag;
  }

  renderCalendar();

  prevNextIcon.forEach((icon) => {
    icon.addEventListener("click", () => {
      if (icon.id === "prev") {
        currMonth = currMonth - 1;
        if (currMonth < 0) {
          currYear -= 1;
          currMonth = 11;
        }
      } else if (icon.id === "next") {
        currMonth = currMonth + 1;
        if (currMonth > 11) {
          currYear += 1;
          currMonth = 0;
        }
      }

      renderCalendar();
    });
  });

  // ...

  // Add a click event listener to the calendar days
  daysTag.addEventListener("click", (event) => {
    let dayNumber;

    // Get the clicked date
    const clickedDate = event.target.textContent;

    // Update the month and year if you clicked on an inactive date
    if (event.target.classList.contains("inactive")) {
      const clickedInactiveDate = parseInt(clickedDate);
      if (clickedInactiveDate >= 25 && clickedInactiveDate <= 31) {
        currMonth = currMonth - 1;
        if (currMonth < 0) {
          currYear -= 1;
          currMonth = 11;
        }
      } else if (clickedInactiveDate >= 1 && clickedInactiveDate <= 6) {
        currMonth = currMonth + 1;
        if (currMonth > 11) {
          currYear += 1;
          currMonth = 0;
        }
      }

      // Re-render the calendar
      renderCalendar();
    }

    // Find and highlight the clicked date in the newly changed month
    let newActiveDate;
    const dayItems = daysTag.querySelectorAll("li:not(.inactive)");
    dayItems.forEach((dayItem) => {
      if (dayItem.textContent === clickedDate) {
        newActiveDate = dayItem;
      }
    });

    if (newActiveDate) {
      // Remove the "active" class from the previously selected date if it exists
      const previousActiveDate = daysTag.querySelector(".active");
      if (previousActiveDate) {
        previousActiveDate.classList.remove("active");
      }

      // Highlight the clicked date
      newActiveDate.classList.add("active");

      dayNumber = parseInt(newActiveDate.textContent);
      const selectedDate = `${currYear}-${(currMonth + 1).toString().padStart(2, "0")}-${dayNumber.toString().padStart(2, "0")}`;
      dateInput.value = selectedDate;

      const selectedDateText = `${months[currMonth]} ${clickedDate}, ${currYear}`;
      selectedDateDisplay.innerText = `Date: ${selectedDateText}`;
    }
  });

  // ...
</script>
<?php require('./includes/end_html.php'); ?>