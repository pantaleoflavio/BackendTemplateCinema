document.addEventListener('DOMContentLoaded', function() {
    const formChooseShowAndSeat = document.getElementById('formChooseShowAndSeat');
    const seatCheckboxes = document.querySelectorAll('.seat-checkbox');
    
    // FUNCTIONS
    function controllCheckAtLeastOneSeat(e) {
        const seatsSelected = document.querySelectorAll('input[name="seats"]:checked').length;
        
        if (seatsSelected === 0) {
            e.preventDefault();
            alert('Please select at least one seat.');
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
