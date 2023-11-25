// var selectedMedicines = [];
// // Array to store selected card information
// var selectedCards = [];

// function toggleSelection(cardId) {



//     // Ask for quantity only if the card is selected
   
//     var card = document.getElementById(cardId);
//     card.classList.toggle('selected');
//     // Update the selectedCards array based on the selected cards
//     selectedCards = [];

//     // Loop through all cards to get the correct quantity for each
//     var cards = document.querySelectorAll('.card.selected');
//     cards.forEach(function (selectedCard) {
//         // Check if the quantity input field exists
//         if (card.classList.contains('selected')) {
//             var quantityInput = prompt('Enter quantity for ' + cardId + ':');
//             if (quantityInput !== null) {
//                 // Log the quantity to the console
//                 console.log('Quantity for ' + cardId + ':', quantityInput);
//                 // You can store or process the quantity as needed
//             }
//         }
//         card.addEventListener('click', function() {
//             toggleSelection(cardId);
//         });

 

//         var medicineName = selectedCard.querySelector('h5').innerText;
//         selectedCards.push({
//             cardId: selectedCard.id,
//             medicineName: medicineName,
//             quantity: quantityInput
//         });
//     });

//     // Update the hidden input value with the selected cards array
//     document.getElementById('selectedCardInfo').value = JSON.stringify(selectedCards);

//     // Provide feedback to the user (e.g., update a counter)
//     updateSelectionFeedback();
// }

// function updateSelectionFeedback() {
//     // Example: Update a counter element with the number of selected items
//     var counterElement = document.getElementById('selectionCounter');
//     counterElement.innerText = selectedCards.length + ' items selected';
// }



// function nextStep(step) {
//     console.log('Next Step: ', step);

//     // Hide all steps
//     document.getElementById('step1').style.display = 'none';
//     document.getElementById('step2').style.display = 'none';

//     var stepIndicator = document.getElementById('stepIndicator').children;
//     for (var i = 0; i < stepIndicator.length; i++) {
//         stepIndicator[i].classList.remove('active');
//     }
//     stepIndicator[step - 1].classList.add('active');

//     // Show the next step based on the parameter
//     if (step === 2) {
//         console.log('Displaying step 2');

//         // Retrieve and parse the selected card information
//         var selectedCardInfo = selectedCards;

//         // Get the selected doctor's name
//         var doctorSelect = document.getElementById('doctorName');
//         var doctorName = doctorSelect.options[doctorSelect.selectedIndex].value;

//         // Get quantities from selectedCardInfo
//         // var quantities = selectedCardInfo.map(function (selectedCard) {
//         //     return selectedCard.quantity;
//         // });

//         // console.log(quantities);
//         var doctorSelect = document.getElementById('doctorName');

//         // Use the information as needed
//         console.log('Selected Card Information:', selectedCardInfo);

//         // Now you have both the selected card information and the doctor's name
//         document.getElementById('step2').style.display = 'block';
//         generateBill(selectedCardInfo);
//     }
// }






// function checkCondition() {


//     var seatType = parseInt(document.getElementById('no1').value);

//     var seatNumber = parseInt(document.getElementById('t1').value);
//     var submitButton = document.getElementById('submitButton');
//     // // Define your conditions here
//     var isValid = false;


//  // alert(seatType);  // Log the seat type
//     // alert( seatNumber);  // Log the seat number
	
//     // Example condition: Seat type 2 should have seat numbers between 1 and 10
//     if (seatType < seatNumber && seatType !== 0  ) {
//         isValid = true;
//     }
//     // Add more conditions as needed for different seat types

//  if (isValid) {
//         submitButton.disabled = true; // Enable the submit button
//     } else {
//         submitButton.disabled = false;  // Disable the submit button
//     }
// }

// function checkCondition1(inputId) {
    
//     var seatType = parseInt(document.getElementById('no1').value);
//     var seatNumber = parseInt(document.getElementById(inputId).value);
//     var submitButton = document.getElementById('submitButton');
    
//     // Define your conditions here
//     var isValid = false;

//     // Example condition: Seat type 2 should have seat numbers between 1 and 10
//     if (seatType < seatNumber && seatType !== 0) {
//         isValid = true;
//     }

//     // Add more conditions as needed for different seat types
//     if (isValid) {
//         submitButton.disabled = true; // Enable the submit button
//     } else {
//         submitButton.disabled = false; // Disable the submit button
//     }
// }



// // function generateBill() {
// //     var billTable = document.getElementById('billTable');
// //     billTable.innerHTML = ''; // Clear previous content

// //     // Create table header
// //     var headerRow = billTable.insertRow(0);
// //     var doctorNameHeader = headerRow.insertCell(0);
// //     doctorNameHeader.innerHTML = '<b>Doctor Name</b>';
// //     var medicineNameHeader = headerRow.insertCell(1);
// //     medicineNameHeader.innerHTML = '<b>Medicine Name</b>';
// //     var quantityHeader = headerRow.insertCell(2);
// //     quantityHeader.innerHTML = '<b>Quantity</b>';

// //     // Fill the table with selected medicines
// //     selectedMedicines.forEach(function (medicine, index) {
// //         var row = billTable.insertRow(index + 1);
// //         var doctorNameCell = row.insertCell(0);
// //         // Add a dropdown for doctor names
// //         doctorNameCell.innerHTML = `<select id="doctorName${index}"><option value="Dr. Smith">Dr. Smith</option><option value="Dr. Johnson">Dr. Johnson</option></select>`;
// //         var medicineNameCell = row.insertCell(1);
// //         medicineNameCell.innerHTML = medicine.name;
// //         var quantityCell = row.insertCell(2);
// //         quantityCell.innerHTML = medicine.quantity;
// //     });


//     // Add this function to your existing JavaScript
//     function generateBill(selectedCardInfo) {
//         // Iterate through the quantities array
//          const pricePerUnit = 10; // Adjust this based on your actual pricing
    
//         // Calculate total price before discount
//         const totalPriceBeforeDiscount = selectedCardInfo.quantity * pricePerUnit;
    
//         // Example: Assuming a fixed discount rate
//         const discountRate = 0.1; // 10% discount
//         const discountAmount = totalPriceBeforeDiscount * discountRate;
    
//         // Calculate GST and SGST
//         const gstRate = 0.18; // 18% GST
//         const sgstRate = 0.09; // 9% SGST
//         const gstAmount = totalPriceBeforeDiscount * gstRate;
//         const sgstAmount = totalPriceBeforeDiscount * sgstRate;
    
//         // Calculate total after discount, GST, and SGST
//         const totalAfterDiscount = totalPriceBeforeDiscount - discountAmount;
//         const totalAfterGST = totalAfterDiscount + gstAmount + sgstAmount;
//         var  medicineName = selectedCardInfo[0].medicineName;
//                 // Display the calculated values in the console (you can modify this based on your UI)
//         console.log('Doctor Name:', selectedCardInfo.doctorName);
//         console.log('Medicine Name:',  medicineName);
//         console.log('Quantity:', selectedCardInfo.quantity);
//         console.log('Discount Amount:', discountAmount);
//         console.log('GST Amount:', gstAmount);
//         console.log('SGST Amount:', sgstAmount);
//         console.log('Total Price Before Discount:', totalPriceBeforeDiscount);
//         console.log('Total After Discount:', totalAfterDiscount);
//         console.log('Total After GST and SGST:', totalAfterGST);
//         var medicineName = selectedCardInfo[0].medicineName;

//         // Create a new row in the bill table
//         var table = document.getElementById('billTable');
//         var row = table.insertRow();
    
//         // Add cells to the row
//         var cells = [
//             selectedCardInfo.doctorName,
//             medicineName,
//             selectedCardInfo.quantity,
//             discountAmount,
//             gstAmount,
//             sgstAmount,
//             totalPriceBeforeDiscount,
//             totalAfterDiscount,
//             totalAfterGST
//         ];
    
//         cells.forEach(function (value) {
//             var cell = row.insertCell();
//             cell.textContent = value;
//         });



// }
   
    
//         // Now, you can update your bill display with these calculated values
    
    

// function calculateDiscount(quantity) {
//     // You can implement your own logic for discount calculation
//     return quantity * 5; // Assuming a discount of 5 per quantity
// }

// function calculateGST(quantity) {
//     // You can implement your own logic for GST calculation
//     return quantity * 8; // Assuming GST of 8% per quantity
// }

// function calculateSGST(quantity) {
//     // You can implement your own logic for SGST calculation
//     return quantity * 4; // Assuming SGST of 4% per quantity
// }

// function calculateTotal(quantity) {
//     var discount = calculateDiscount(quantity);
//     var gst = calculateGST(quantity);
//     var sgst = calculateSGST(quantity);

//     return quantity * 10 - discount + gst + sgst; // Assuming base cost of 10 per quantity
// }

// function updateTotalAmount() {
//     var totalValue = 0;
//     var table = document.getElementById('billTable').getElementsByTagName('tbody')[0];

//     for (var i = 0; i < table.rows.length; i++) {
//         totalValue += parseFloat(table.rows[i].cells[6].innerHTML);
//     }

//     document.getElementById('totalValue').innerHTML = totalValue.toFixed(2);
// }
    
// // function removeItem(button) {
// //     var row = button.parentNode.parentNode;
// //     row.parentNode.removeChild(row);

// //     updateTotalAmount();
// // }
// // function displayBill() {
// //     var billContainer = document.getElementById('billContainer');
// //     billContainer.innerHTML = ''; // Clear previous content

// //     // Create a div to hold the bill content
// //     var billContent = document.createElement('div');

// //     // Create a table for the bill
// //     var billTable = document.createElement('table');
// //     billTable.id = 'billTable';

// //     // Create table header
// //     var headerRow = billTable.insertRow();
// //     var headers = ['Medicine Name', 'Quantity', 'Price', 'Total'];
// //     for (var i = 0; i < headers.length; i++) {
// //         var headerCell = headerRow.insertCell(i);
// //         headerCell.textContent = headers[i];
// //     }

// //     // Create table rows with selected medicines
// //     for (var i = 0; i < selectedMedicines.length; i++) {
// //         var row = billTable.insertRow();
// //         var medicine = selectedMedicines[i];
        
// //         var cell1 = row.insertCell(0);
// //         cell1.textContent = medicine.name;

// //         var cell2 = row.insertCell(1);
// //         cell2.textContent = medicine.quantity;

// //         // You can add more logic to fetch price and calculate total based on your requirements
// //         var cell3 = row.insertCell(2);
// //         cell3.textContent = 'Price';

// //         var cell4 = row.insertCell(3);
// //         cell4.textContent = 'Total';
// //     }

// //     // Append the bill table to the bill content div
// //     billContent.appendChild(billTable);

// //     // Add a "Previous" button to go back to step 1
// //     var previousButton = document.createElement('button');
// //     previousButton.textContent = 'Previous';
// //     previousButton.onclick = function () {
// //         goToStep(1);
// //     };
// //     billContent.appendChild(previousButton);

// //     // Append the bill content to the bill container
// //     billContainer.appendChild(billContent);
// // }
 function toggleSelection(cardId) {
    var card = document.getElementById(cardId);
    card.classList.toggle('selected');

    // Get details from the card
    var medicineName = card.querySelector('h5').innerText;

    // Open the Bootstrap modal
    var quantityModal = new bootstrap.Modal(document.getElementById('quantityModal'));
    quantityModal.show();

    // Add medicineName to the modal for reference
    document.getElementById('quantityModal').dataset.medicineName = medicineName;
  }

  function handleQuantityEntry() {
    // Retrieve entered quantity from the modal input
    var enteredQuantity = document.getElementById('quantityInput').value;

    // Retrieve medicineName from the modal dataset
    var medicineName = document.getElementById('quantityModal').dataset.medicineName;

    // Do further processing based on enteredQuantity and medicineName
    console.log('Medicine:', medicineName);
    console.log('Entered Quantity:', enteredQuantity);

    // Close the modal
    var quantityModal = new bootstrap.Modal(document.getElementById('quantityModal'));
    quantityModal.hide();
  }

function toggleSelection(cardId) {
    var card = document.getElementById(cardId);

    // Check if the card element exists
    if (!card) {
        console.error(`Card with ID ${cardId} not found.`);
        return;
    }

    card.classList.toggle('selected');

    // Get details from the card
    var medicineName = card.querySelector('h5').innerText;

    // Make an XMLHttpRequest to fetch data from the server
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'js/getdata.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Parse the JSON response
            var data = JSON.parse(xhr.responseText);

            // Find the entry in the data array that matches the medicineName
            var entry = data.find(entry => entry.medname === medicineName);

            // Check if entry is found
            if (entry) {
                var price = entry.price;
                var allowedQuantity = entry.quantity;

                // Create a text input for the quantity
                var userQuantity = window.prompt(`Enter quantity for ${medicineName} (Price: ${price}, Allowed Quantity: ${allowedQuantity}):`);

                // Check if userQuantity is not null (i.e., user clicked OK)
                if (userQuantity !== null) {
                    userQuantity = parseInt(userQuantity);

                    // Check if the user quantity exceeds the allowed quantity
                    if (userQuantity > allowedQuantity) {
                        alert(`Quantity cannot exceed ${allowedQuantity}.`);
                    } else {
                        var alertMessage = `Medicine: ${medicineName}\nPrice: ${price}\nQuantity: ${userQuantity}`;

                        alert(alertMessage);

                        // Change the background color of the selected card
                        if (card.classList.contains('selected')) {
                            card.style.backgroundColor = 'lightblue';
                        } else {
                            card.style.backgroundColor = ''; // Reset to default background color
                        }
                    }
                } else {
                    // User clicked Cancel in the prompt
                    console.log('User canceled quantity entry.');
                }
            } else {
                console.error('Entry not found for medicine: ' + medicineName);
            }
        }
    };

    // Send the XMLHttpRequest
    xhr.send();
}
