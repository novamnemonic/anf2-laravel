<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script>
        $(document).ready( function() {
            $("#nombre").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
    <script>
        const colorInput = document.querySelector('#colora'),
              colorInputb = document.querySelector('#colorb'),
              hex = document.querySelector('#ejemplo'),
              colora = document.querySelector('input[name=color1]');
              colorb = document.querySelector('input[name=color2]');

        if (!colora.value){
            colora.value = '#000000';
        }
        if (!colorb.value){
            colora.value = '#ffffff';
        }
        colorInput.value = colora.value;
        colorInputb.value = colorb.value;


        colorInput.addEventListener('input',()=>{
            let color = colorInput.value;
            colora.value = color;
            hex.style.color = color;
        })
        colorInputb.addEventListener('input',()=>{
            let color2 = colorInputb.value;
            colorb.value = color2;
            hex.style.backgroundColor = color2;
        })
        function pinta_ejemplo() {
            let color = colorInput.value;
            colora.value = color;
            hex.style.color = color;
            let color2 = colorInputb.value;
            colorb.value = color2;
            hex.style.backgroundColor = color2;
        }
        pinta_ejemplo();
    </script>
    <script>
        $('#nombre').keyup(function() {
            var datos = new String($('#nombre').val());
            datos = datos.toUpperCase(datos);
            $('#nombre').val(datos);
        })
    </script>
