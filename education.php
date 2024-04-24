<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<input type="text" placeholder="animal">
<button></button>
<script>

var name = 'cheetah'
$.ajax({
    method: 'GET',
    url: 'https://api.api-ninjas.com/v1/animals?name=' + name,
    headers: { 'X-Api-Key': 'Nlat/WGCXuj/45KHZ5/cfQ==yhi00ZG7gOXjjubB'},
    contentType: 'application/json',
    success: function(result) {
        console.log(result);
    },
    error: function ajaxError(jqXHR) {
        console.error('Error: ', jqXHR.responseText);
    }
});
</script>

