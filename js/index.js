$('.toggle').on('click', function() {
  $('.container').stop().addClass('active');
});

$('.close').on('click', function() {
  $('.container').stop().removeClass('active');
});

function MyClick()
{
  let form = document.createElement('form1');
  form.action = '../import1.php';
  form.method = 'GET'; 
  // the form must be in the document to submit it
  document.body.append(form);
  
  form.submit();
}