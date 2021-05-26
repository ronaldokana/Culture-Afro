
$(document).ready(function(){
  $("#product_id ").change(function (){
      var id = $(this).val();

      $.ajax({
        url:'getproductbyId/'+id,
        type:'get',
        dataType:'json',
        success:function(response){
            response.forEach(item=>{
             
              $('#stock').val(item.qty),
              $('#prix').val(item.price)
            });
        }
      })
  });

  $("#qtycde").keyup(function(){
    var total = $('#prix').val() * $('#qtycde').val();
    $('#stotal').val(total);

  });
})
