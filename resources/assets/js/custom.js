//custom js file
let axios=require('axios');

$('body').on('click','.delete-bookmark',function(){

    id=$(this).data('id');

    //do a delete to this url
    axios.delete('/bookmarks/'+id)
        .then(function(){
            window.location.reload();
        })
        .catch(function(error){
            alert(error);
    })
});
