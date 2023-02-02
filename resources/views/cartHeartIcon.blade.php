<script>
  
    function addProductToSession(id){
        $.ajax({url:'{{url('/add-product')}}',data:{id:id},success:(data)=>{
            console.log(data);
        }})
    }
    
    function addProductToHeart(id){
        $.ajax({url:'{{url('/add-heart')}}',data:{id:id},success:(data)=>{
            console.log(data)
        }})
    }
    </script>