  <script>
$(document).ready(function(){

 function clear_icon()
 {
  $('#id_icon').html('<i class="fa fa-sort"></i>');
  $('#title_icon').html('<i class="fa fa-sort"></i>');
 }

 function fetch_data(page, sort_type, sort_by, query)
 {
  $.ajax({
   url:'/administrator/fetchData?page='+page+'&sortby='+sort_by+'&sorttype='+sort_type+'&query='+query,
   headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
   success:function(data)
   {

    $('tbody').html('');

    $('tbody').html(data);

   }
  })
 }

 $(document).on('keyup', '#serach', function(){
  var query = $('#serach').val();
  var column_name = $('#hidden_column_name').val();
  var sort_type = $('#hidden_sort_type').val();
  var page = $('#hidden_page').val();
  fetch_data(page, sort_type, column_name, query);
 });

 $(document).on('click', '.sorting', function(){
  var column_name = $(this).data('column_name');
  var order_type = $(this).data('sorting_type');
  var reverse_order = '';
  if(order_type == 'asc')
  {
   $(this).data('sorting_type', 'desc');
   reverse_order = 'desc';
   clear_icon();
   $('#'+column_name+'_icon').html("<i class='fa fa-sort-down'></i>");
  }
  if(order_type == 'desc')
  {
   $(this).data('sorting_type', 'asc');
   reverse_order = 'asc';
   clear_icon();
   $('#'+column_name+'_icon').html("<i class='fa fa-sort-up'></i>");
  }
  $('#hidden_column_name').val(column_name);
  $('#hidden_sort_type').val(reverse_order);
  var page = $('#hidden_page').val();
  var query = $('#serach').val();
  fetch_data(page, reverse_order, column_name, query);
 });

 $(document).on('click', '.pagination a', function(event){
  event.preventDefault();
  var page = $(this).attr('href').split('page=')[1];
  $('#hidden_page').val(page);
  var column_name = $('#hidden_column_name').val();
  var sort_type = $('#hidden_sort_type').val();

  var query = $('#serach').val();

  $('li').removeClass('active');
        $(this).parent().addClass('active');
  fetch_data(page, sort_type, column_name, query);
 });

});
</script>