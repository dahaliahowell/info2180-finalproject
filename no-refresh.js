$(document).ready(function() {
    // if a navigation link is clicked load the page
    $("nav a").on('click', function(event) {
      event.preventDefault();
  
      let page = $(this).attr("href");
      
      // Use the History API to update the browser history with the
      // new URL so we can use the browser back and forward buttons
      let stateObj = { page: formatForUrl(page) };
      history.pushState(stateObj, null, formatForUrl(page));
  
      // load the page and put it's contents in the main element.
      requestContent(page);
  
      // Update the page title in the browser tab
      document.title = 'BugMe Issue Tracker | ' + formatForUrl(page);
  
      // Update active class on navigation links
      removeActiveClass();
      $(event.target).parent().addClass('active');
    });
  
    // This is triggered whenever a user clicks the forward and back buttons
    // in the web browser.
    $(window).on('popstate', function(event) {
      // console.log('pop state triggered');
      let page = history.state.page;
      let filename = page + '.php';
  
      // load the page and put it's contents in the main element.
      requestContent(filename);
  
      // Update the page title in the browser tab
      document.title = 'My AJAX Web Page | ' + page;
  
      // Update active class on navigation links
      removeActiveClass();
      $('#nav-' + page).parent().addClass('active');
    });
  });
  
  /**
   * Format page filename to get the page name
   *
   * @param page string the path to the page with extension.
   * @return string
   */
  function formatForUrl(page) {
    var pageName = page.split('.');
    return pageName[0];
  }
  
  /**
   * Load the page and put it's contents in the main element.
   * 
   * @param string filename 
   */
  function requestContent(filename) {
    $('main').load(filename);
  }
  
  function removeActiveClass() {
    $('nav li.active').removeClass('active');
  }