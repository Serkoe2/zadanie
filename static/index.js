var app = new Vue({
    el : "#app",
    data : {
        items : [],
        form  : false
    },
    methods : {
        render_data : function (data){
            data = JSON.parse(data)
            this.items = data
        },
        delItem : function(event){
            id = $(event.path[2]).children()[0].innerText
            $.post("commands/del.php",{"id": id}).done(function (response){
                    for (let i=0; i<app.items.length; i++)
                    {
                        if (app.items[i]["id"] == id){
                            app.items.splice(i,1)
                        }
                    }
                })
        },
        addItem : function (){
            this.form = true
        },
        save_data   : function(){
            data = {
                name  : $("[name=name]").val(),
                price : parseInt($("[name=price]").val()),
                description : $("[name=description]").val(),
                file : $("[name=file]").prop('files')[0]
            }
            if (!data.name || !data.price )
            {
                return false 
            }
        
            let form_data = new FormData()
            form_data.append('name', data.name)
            form_data.append('price', data.price)
            form_data.append('description', data.description)
            form_data.append('file', data.file)

            console.log(form_data)
            $.ajax({
                url         : 'commands/save.php',
                type        : 'POST',
                data        : form_data,                      
                type        : 'post',
                cache       : false,
                processData : false,
                contentType : false,
                success     : function (response){
                    response = JSON.parse(response)
                    data["id"] = response[0]
                    data["url"] = response[1]
                    app.items.push(data)
                    app.form = false
                },
                error       : function (error){
                    console.log("AAAA")
                    alert(error)
                }
            })
            }
    }
})

function load_data(){
    $.get("commands/load.php").done(app.render_data)
}

load_data()