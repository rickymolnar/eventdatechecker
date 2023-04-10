<script type="text/javascript">
  // Wait until the page is loaded
  document.addEventListener('DOMContentLoaded', function() {
    // Get all elements with a specific CSS class
    var eventList = document.querySelectorAll('.eventstable');
    console.log("Starting date check...");

    // Loop through each event and check if its date is in the past
    for (var i = 0; i < eventList.length; i++) {
      console.log("\nChecking " + (i + 1) + " of " + eventList.length + " tables.");
      var dateElements = eventList[i].querySelectorAll('.auto-hide-event-date');
      var eventDate = '';
	  console.log("Found " + dateElements.length + " auto-hide date(s).");
    
    if (dateElements.length > 0) {
      // Concatenate the text content of the .auto-hide-event-date element
      for (var j = 0; j < dateElements.length; j++) {
        eventDate += dateElements[j].textContent.replace(/[\n\r]+|[\s]{2,}/g, ' ').trim();
        console.log(eventDate);

        //Now, convert it to an object that can be read
        var dateStr = eventDate;
        var dateArr = dateStr.split(' ');

        // Remove the ordinal suffix from the day
        var day = dateArr[1].replace(/(st|nd|rd|th)/, '');

        // Get the month and year
        var month = dateArr[0];
        var year = new Date().getFullYear();
      
        // Create a new date string in the format "Month Day Year"
        var newDateStr = month + ' ' + day + ' ' + year;

        // Create a new date object from the new date string
        var dateObj = new Date(newDateStr);
      	dateObj.setHours(23, 59, 59, 0);

        console.log("Converted date to format: " + dateObj);
      }

      // If the event date is in the past, hide the .eventstable element
      if (new Date(dateObj) < new Date()) {
        console.log("Past date detected!");
        eventList[i].style.display = 'none';
        console.log("Date of " + eventDate + " now removed.");
      }
     }
    }
  });
</script>
