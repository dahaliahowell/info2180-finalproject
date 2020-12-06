window.onload = function() {

    var all_filter = document.getElementById("all");
    var open_filter = document.getElementById("open");
    var my_tickets = document.getElementById("my-tickets");

    all_filter.addEventListener('click', function(element) {
        element.preventDefault();

        var active = document.getElementsByClassName('active-btn')[0];

        active.classList.remove("active-btn");

        // active.forEach(function(element, index, list) {
        //     element.classList.remove("active-btn");
        //     console.log('active removed to all');
        // })

        all_filter.classList.add('active-btn');
    });

    open_filter.addEventListener('click', function(element) {
        element.preventDefault();

        var active = document.getElementsByClassName('active-btn')[0];
        active.classList.remove("active-btn");

        // active.forEach(function(element, index, list) {
        //     element.classList.remove("active-btn");
        //     console.log('active removed to open');
        // })

        open_filter.classList.add('active-btn');
    });

    my_tickets.addEventListener('click', function(element) {
        element.preventDefault();

        var active = document.getElementsByClassName('active-btn')[0];
        active.classList.remove("active-btn");

        // active.forEach(function(element, index, list) {
        //     element.classList.remove("active-btn");
        //     console.log('active removed to tickets');
        // })

        my_tickets.classList.add('active-btn');
    });
  

  
};