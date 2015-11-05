
var services = {
    colors: {
        list: function(url, done){
            $.ajax({
                url    : url,
                method : "GET"
            }).done(done);
        }
    }
};