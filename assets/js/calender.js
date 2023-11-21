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
      currYear === date.getFullYear()
        ? "active"
        : "";
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



