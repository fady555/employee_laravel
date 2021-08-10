{{------- wizerd step ----------------}}
<script src="{{asset('them/src/plugins/jquery-steps/jquery.steps.js')}}"></script>

<!-- switchery js -->
<script src="{{asset('them/src/plugins/switchery/switchery.min.js')}}"></script>
<!-- bootstrap-tagsinput js -->
<script src="{{asset('them/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
<!-- bootstrap-touchspin js -->
<script src="{{asset('them/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
<script src="{{asset('them/vendors/scripts/advanced-components.js')}}"></script>

<script src="{{asset('them/src/plugins/sweetalert2/sweetalert2.all.js')}}"></script>


@if(session()->has('add_employee'))

    <script>
        swal(
            {
                title: '{{session()->get('add_employee')}}',
                text: 'You clicked the button!',
                type: 'success',
                showCancelButton: false,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger'
            }
        )
    </script>

@endif

@if(session()->has('edit_employee'))

    <script>
        swal(
            {
                title: '{{session()->get('edit_employee')}}',
                text: 'You clicked the button!',
                type: 'success',
                showCancelButton: false,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger'
            }
        )
    </script>

@endif




<script>
    function RemoveError(name){
        var input = document.getElementById(name);
        var parent = input.parentNode;

        parent.classList.remove('has-danger');
        input.classList.remove('form-control-danger');
        if(parent.children[2]){parent.children[2].remove();}

    }
</script>

<script>
    $(".tab-wizard").steps({
        headerTag: "h5",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit"
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            $('.steps .current').prevAll().addClass('disabled');
        },
        /*onFinished: function (event, currentIndex) {
            $('#success-modal').modal('show');
        }*/

        onFinished: function (event, currentIndex) {
            $("#form")[0].submit();
            //alert('dfdfs');
        }

    });


</script>

<script>
    //ajax jquery

    function JopGet(){
        document.getElementById('jop_id').textContent = '';
        $.get("{{url('jops')}}",function (one,two){
            //console.log(JSON.parse(one.trim()));
            var jops = JSON.parse(one.trim());
            var select = document.getElementById('jop_id');

            for(var i = 0 ; i< jops.length ; i++){
                var option   =document.createElement('option');
                option.value =jops[i]['id'];
                option.text  =jops[i]['name_'+"{{app()->getLocale()}}"];
                select.appendChild(option);
            }
        });
    }

    $('#jop_id_refresh').click(function (){ JopGet(); });

    //First Execute that function
    JopGet();

</script>
<script>
    //ajax jquery

    function TypeOfWorkGet(){
        document.getElementById('type_id').textContent = '';
        $.get("{{url('type_of_works')}}",function (one,two){
            //console.log(JSON.parse(one.trim()));
            var types = JSON.parse(one.trim());
            var select = document.getElementById('type_id');

            for(var i = 0 ; i< types.length ; i++){
                var option   =document.createElement('option');
                option.value =types[i]['id'];
                option.text  =types[i]['work_type_'+"{{app()->getLocale()}}"];
                select.appendChild(option);
            }
        });
    }

    $('#type_id_refresh').click(function (){ TypeOfWorkGet(); });

    //First Execute that function
    TypeOfWorkGet();

</script>

<script>
    //ajax jquery

    function EducationStatusGet(){
        document.getElementById('education_status_id').textContent = '';
        $.get("{{url('education_status')}}",function (one,two){
            //console.log(JSON.parse(one.trim()));
            var education = JSON.parse(one.trim());
            var select = document.getElementById('education_status_id');

            for(var i = 0 ; i< education.length ; i++){
                var option   =document.createElement('option');
                option.value =education[i]['id'];
                option.text  =education[i]['education_status_'+"{{app()->getLocale()}}"];
                select.appendChild(option);
            }
        });
    }

    $('#education_status_id_refresh').click(function (){ EducationStatusGet(); });

    //First Execute that function
    EducationStatusGet();

</script>

<script>
    //ajax jquery

    function DegreeGet(){
        document.getElementById('degree_id').textContent = '';
        $.get("{{url('degrees')}}",function (one,two){
            //console.log(JSON.parse(one.trim()));
            var degrees = JSON.parse(one.trim());
            var select = document.getElementById('degree_id');

            for(var i = 0 ; i< degrees.length ; i++){
                var option   =document.createElement('option');
                option.value =degrees[i]['id'];
                option.text  =degrees[i]['degree_'+"{{app()->getLocale()}}"];
                select.appendChild(option);
            }
        });
    }

    $('#degree_id_refresh').click(function (){ DegreeGet(); });

    //First Execute that function
    DegreeGet();

</script>

<script>
    //ajax jquery

    function LevelExperienceGet(){
        document.getElementById('level_experience_id').textContent = '';
        $.get("{{url('experience')}}",function (one,two){
            //console.log(JSON.parse(one.trim()));
            var expeiences = JSON.parse(one.trim());
            var select = document.getElementById('level_experience_id');

            for(var i = 0 ; i< expeiences.length ; i++){
                var option   =document.createElement('option');
                option.value =expeiences[i]['id'];
                option.text  =expeiences[i]['level_experience_'+"{{app()->getLocale()}}"];
                select.appendChild(option);
            }
        });
    }

    $('#level_experience_id_refresh').click(function (){ LevelExperienceGet(); });

    //First Execute that function
    LevelExperienceGet();

</script>

<script>// script of address for mwizard step

    //ajax jquery

    function GetCities(country_id){
        document.getElementById('city_id').textContent = '';



        $.get("{{url('cities')}}" + "/" + country_id,function (one,two){
            //console.log(JSON.parse(one.trim()));
            var cities = JSON.parse(one.trim());
            var select = document.getElementById('city_id');



            for(var i = 0 ; i< cities.length ; i++){
                var option   =document.createElement('option');
                option.value =cities[i]['id'];
                option.text  =cities[i]['name_'+"{{app()->getLocale()}}"];
                select.appendChild(option);
            }
        });
    }

</script>

<script>// script user form wizard step

    function GenerateUsername(){
        $.get("{{url('generate-username')}}",function (one){
            //console.log(one.trim());
            document.getElementById('username').value = one.trim();
        });
    }

    $('#usergenerate').click(function (){
        GenerateUsername();
    });


</script>
