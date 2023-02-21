<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
<script src="{{asset('vendor/jqueryui-1-13-2/jquery-ui.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <script>
        const $activoCheckbox = document.querySelector("#activo");
        $activoCheckbox.checked = true;
        $(document).ready( function() {
            $("#titulo").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
    <script>
        $('#titulo').keyup(function() {
            var datos = new String($('#titulo').val());
            datos = datos.toUpperCase(datos);
            $('#titulo').val(datos);
        })
    </script>
    <script>
        $('#lista_etiquetas').autocomplete({
            minLength: 0,
            source: function(request, response){
                $.ajax({
                    url: "{{route('listas.etiquetas')}}",
                    dataType: 'json',
                    data:{
                        term: request.term
                    },
                    success: function(data){
                        response(data)
                    }
                });
            },
            focus: function( event, ui ) {
                $( "#lista_etiquetas" ).val( ui.item.label );
                return false;
            },
            select: function( event, ui ) {
                label_word =  ui.item.label ;
                id_word =  ui.item.id ;
                tagsbox(id_word,label_word);
                return false;
            }
        });
        function tagsbox(id_word,label_word){
            var check_id ="<input class=\"form-check-input\" type=\"checkbox\" name=\"etiquetas[]\" value=\""+id_word+"\" id=\""+id_word+"\" checked>";
            var check_label = "<label class=\"form-check-label\" for=\""+label_word+"\">"+label_word+"</label><br>";
            var check = check_id + check_label;
            $('#etiquetas').append(check);
            $('#lista_etiquetas').val('');
            $('#lista_etiquetas').focus();
        }
    </script>

    <script>
        let $inputFile = document.getElementById('archivo_original_ruta');
        let $miDivName = document.getElementById('archivo_subido') //debajo del $miBoton

       /* $inputFile.addEventListener('change', (e) => {
            console.log(e.target.files[0].name);
            $miDivName.innerHTML = e.target.files[0].name
        })*/
    </script>

    <script>
        //evitamos mandar el formulario con la tecla enter

        //**** titulo
        const $titulo_form = document.querySelector("#titulo");
        // Escuchamos el keydown y prevenimos el evento
        $titulo_form.addEventListener("keydown", (evento) => {
	        if (evento.key == "Enter") {
		        // Prevenir
		        evento.preventDefault();
		        return false;
	        }
        });

        //**** titulo-corto
        const $titulo_corto_form = document.querySelector("#titulo_corto");
        // Escuchamos el keydown y prevenimos el evento
        $titulo_corto_form.addEventListener("keydown", (evento) => {
	        if (evento.key == "Enter") {
		        // Prevenir
		        evento.preventDefault();
		        return false;
	        }
        });

        //**** lista_etiquetas
         const $lista_etiquetas_form = document.querySelector("#lista_etiquetas");
        // Escuchamos el keydown y prevenimos el evento
        $lista_etiquetas_form.addEventListener("keydown", (evento) => {
	        if (evento.key == "Enter") {
		        // Prevenir
		        evento.preventDefault();
		        return false;
	        }
        });

        //**** fecha_publicacion
         const $fecha_publicacion_form = document.querySelector("#fecha_publicacion");
        // Escuchamos el keydown y prevenimos el evento
        $fecha_publicacion_form.addEventListener("keydown", (evento) => {
	        if (evento.key == "Enter") {
		        // Prevenir
		        evento.preventDefault();
		        return false;
	        }
        });

        //**** pie
         const $pie_form = document.querySelector("#pie");
        // Escuchamos el keydown y prevenimos el evento
        $pie_form.addEventListener("keydown", (evento) => {
	        if (evento.key == "Enter") {
		        // Prevenir
		        evento.preventDefault();
		        return false;
	        }
        });

        //**** peso
         const $peso_form = document.querySelector("#peso");
        // Escuchamos el keydown y prevenimos el evento
        $peso_form.addEventListener("keydown", (evento) => {
	        if (evento.key == "Enter") {
		        // Prevenir
		        evento.preventDefault();
		        return false;
	        }
        });


    </script>
    <script>
        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;

        $("body").on("change", ".image", function(e){
            var files = e.target.files;
            var done = function (url) {
                image.src = url;
                $modal.modal('show');
            };

            var reader;
            var file;
            var url;

            if (files && files.length > 0) {
                file = files[0];

                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                reader.readAsDataURL(file);
                }
            }
        });
        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 16 / 9,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        $("#crop").click(function(){
            canvas = cropper.getCroppedCanvas({
                width: 1920, //1920
                height: 1080, //1080

            });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    const pic = document.getElementById("picture");
                    pic.src = base64data;
                    $modal.modal('hide');
                    const arch = document.getElementById("archivo_original_ruta");
                    arch.value = base64data;
                    console.log(arch.value);

                }
            },'image/jpeg');
        });
    </script>
