/******w**************
    
    Assignment 4 Javascript
    Name:
    Date:
    Description:

*********************/
let address = document.getElementById("search-bar");
const form = document.getElementById("form");
const resultList = document.querySelector(".result-date-list");
const hi = document.getElementById("hi");
const errorMSG = document.querySelector(".error-message");
const errorBox = document.querySelector(".error");
const currentDate = new Date();
const currentYear = currentDate.getFullYear();
const currentMonth = currentDate.getMonth();
const daysOfWeek = [
     "sunday",
     "monday",
     "tuesday",
     "wednesday",
     "thursday",
     "friday",
     "saturday",
];
const monthsOfYear = [
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

// fetch data from open dataset
function GetData(address) {
     console.log(address);
     fetch(
          `https://data.winnipeg.ca/resource/6rcy-9uik.json?combined_address=${address.toUpperCase()}`
     )
          .then((response) => response.json())
          .then(logSchedule)
          .catch((err) => {
               renderError("Can't find address!");
               console.log(err);
          });
}

// log schedule on page
function logSchedule(data) {
     const arr = possibleDays(
          getFirstWord(data[0].collection_day).toLowerCase()
     );
     for (let i = arr.length - 1; i > 1; i--) {
          let html = `<li class="result-date">
           <p class="Day">${getFirstWord(data[0].collection_day)}</p>
           <p class="Date">${monthsOfYear[currentMonth]} ${
               arr[i]
          } ${currentYear}</p>
           <div class="icons">
                <ion-icon name="flower-outline"></ion-icon>
                <ion-icon name="earth-outline"></ion-icon>
                <ion-icon name="leaf-outline"></ion-icon>
           </div>
      </li>`;

          resultList.insertAdjacentHTML("afterbegin", html);

          hi.textContent = `Your collection schedule for ${data[0].combined_address}`;
     }
}

// Clear schedule
function clearSchedule() {
     resultList.innerHTML = "";
     hi.textContent = "";
}

// Render Error
function renderError(errMsg) {
     if (address.value !== "") {
          errorMSG.textContent = `${errMsg}`;
          errorBox.style.display = "block";
     }
}

// Handle search bar submit
//
form.addEventListener("submit", function (e) {
     e.preventDefault();
     clearSchedule();
     GetData(address.value);
});

document
     .getElementById("search-bar")
     .addEventListener("change", function (event) {
          console.log(event);
          errorBox.style.display = "none";
     });
/////////////////////////////////////////////////////
//////////// Helper function ////////////////////////
/////////////////////////////////////////////////////

// get first word of a sentence
function getFirstWord(str) {
     return str.substr(0, str.indexOf(" "));
}

// Get possible dates of current month by providing day of week
function possibleDays(targetDay) {
     targetDay = targetDay.toLowerCase();
     const firstDay = new Date(currentYear, currentMonth, 1).getDay();
     const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

     // Calculate the difference between the target day and the first day of the month
     const dayDifference = (daysOfWeek.indexOf(targetDay) - firstDay + 7) % 7;

     // Generate the list of possible days
     const possibleDaysList = [];
     for (let day = dayDifference + 1; day <= daysInMonth; day += 7) {
          possibleDaysList.push(day);
     }

     return possibleDaysList;
}
