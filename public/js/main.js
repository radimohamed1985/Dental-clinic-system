// let service =document.getElementById('service');
// // document.getElementById('service').onchange = getPrice;
// service.onchange = getPrice;
// let PrintBtn =document.getElementById('print');
// PrintBtn.onclick =console.log('hello');
document.addEventListener('click',function(e){
    if(e.target.id ==='print'){
        e.preventDefault();
        Printing();
    }

    if(e.target.id ==='patientAccount'){
        e.preventDefault();
        addpatientaccount();
    }

    if(e.target.id ==='service'){
      getPrice();
    }
});


    function Printing(){
        document.getElementById('app').classList.add('hidden');
        document.getElementById('printbtn').classList.add('hidden');
        window.print();
    };

    function getPrice(){
        let servicevalue =document.getElementById('service').value;
        // console.log(servicevalue);
    let myreq =new XMLHttpRequest();
    myreq.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            // console.log(this.responseText);
            document.getElementById('servicePrice').value =this.responseText;
                    }
                };
                myreq.open("GET","price/" + servicevalue ,true);
                myreq.send();
                };
function addpatientaccount(){
    var id = $('#patient_id').val();
    var x = $('#service').val();

    console.log(x);
    var xx = $('#servicePrice').val();
    console.log(xx);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type:'POST',
        url:'transaction',
        data:{
            'patient_id':id,
            'service': x,
            'servicePrice': xx,
            // 'service_date':date('Y-m-d')
        },
        success: function() {
            alert("تم تسجيل البيان ");
        }
    })
}
