document.addEventListener('DOMContentLoaded', function() {
    const formChooseShowAndSeat = document.getElementById('formChooseShowAndSeat');
    const seatCheckboxes = document.querySelectorAll('.seat-checkbox');
    
    // FUNCTIONS
    function controllCheckAtLeastOneSeat(e) {
        
        const selectedSeats = document.querySelectorAll('input[type="checkbox"][name="seats[]"]:checked');
        if (selectedSeats.length === 0) {
            alert('Please select at least one seat.');
            e.preventDefault();
        }
    }

    function changeColorIfSeatSelected(e) {
        const checkbox = e.target;
        if (checkbox.checked) {
            checkbox.parentElement.classList.remove('btn-outline-primary');
            checkbox.parentElement.classList.add('btn-primary');
        } else {
            checkbox.parentElement.classList.remove('btn-primary');
            checkbox.parentElement.classList.add('btn-outline-primary');
        }
    }

    // Event Listener
    formChooseShowAndSeat.addEventListener('submit', controllCheckAtLeastOneSeat);

    seatCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', changeColorIfSeatSelected);
    });
});
