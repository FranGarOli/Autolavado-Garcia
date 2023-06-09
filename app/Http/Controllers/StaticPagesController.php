<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use Carbon\Carbon;
use App\Models\Client;
use App\Models\RegisterService;
use App\Models\Register;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BookingRequest;

class StaticPagesController extends Controller
{
    public function index(){
        return view('front.index');
    }

    public function services(){
        return view('front.services');
    }

    public function contact(){
        return view('front.contact');
    }

    public function dateBookings(){
        return view('front.bookings');
    }

    public function cookies(){
        return view('front.cookies');
    }

    public function tapicerias(){
        return view('front.typeServices.tapicerias');
    }

    public function motor(){
        return view('front.typeServices.motor');
    }

    public function ofertas(){
        return view('front.typeServices.ofertas');
    }

    public function interior(){
        return view('front.typeServices.interior');
    }

    public function completas(){
        return view('front.typeServices.completas');
    }

    public function desinfecciones(){
        return view('front.typeServices.desinfecciones');
    }

    public function exterior(){
        return view('front.typeServices.exterior');
    }

    public function pulidas(){
        return view('front.typeServices.pulidas');
    }

    public function productos(){
        return view('front.typeServices.productos');
    }

    public function trabajos(){
        return view('front.typeServices.trabajos');
    }

    public function sendEmail(Request $request){

        //Datos que recibimos del formulario
        $name = $request->get('name');
        $email = $request->get('email');
        $mensaje = $request->get('mensaje');

        Mail::to('fran.garciaa22@gmail.com')->send(new ContactForm($name, $email, $mensaje));

        //Redirigimos a la pagina contacto
        return redirect()->back()->with('mensaje', 'El mensaje se ha mandado. Recibirás una respuesta por email.');
    }

    //reservar cita
    public function saveBooking(BookingRequest $request){

        //creamos un registro nuevo
        $register = new Register();

        //validar campos del formulario ¿crear un request y ahorrarse esto? -> PENDIENTE

        // fin validacion

        /* ------------------------ VALIDAR CLIENTE ------------------------
            SI EXISTE -> RELACIONAS EL client_id CON EL ID DEL CLIENTE EXISTENTE,
            SI NO EXISTE -> CREAS UN CLIENTE Y LO ASOCIAS AL REGISTRO QUE VAS A CREAR
        */

        //cogemos el nombre del cliente que hemos metido por el formulario
        $nameClientFormReceived = $request->get('name');
        //validamos si existe un cliente con ese nombre
        $existClient = Client::where('name', $nameClientFormReceived)->first();


        //si existe el client asocia el id al client_id
        if ($existClient){

            $register->client_id = $existClient->id;

        }

        //si no existe el cliente se crea
        else{

            $client = new Client();
            $client->name = $request->get('name');
            $client->dni = $request->get('dni');
            $client->phone = $request->get('phone');
            $client->email = $request->get('email');

            $client->save();

            //asociamos el registro que vamos a crear con el id del cliente recien generado
            $register->client_id = $client->id;
        }

        $register->plate = $request->get('plate');
        $register->model = $request->get('model');
        $register->entryDate = Carbon::now();
        $register->limitDate = $request->get('limitDate');

        //creamos el servicio ahora para poder coger su id y asociar los servicios
        $register->save();


        /* ------------------------ ASOCIAR SERVICIOS AL REGISTRO  ------------------------
            POR CADA VALOR DEL ARRAY TRANSFORMADO -> CREARÁ UNA ENTIDAD EN register_service
            ASOCIANDO EL ID DEL REGISTRO CREADO CON EL ID DEL SERVICIO
        */

        //dividimos el array que nos llega del input servicios
        $arrayServicios = explode(",", $request->get('servicios'));

        $registros_servicios = DB::table('services')
            ->whereIn('title', $arrayServicios)
            ->get();

        //prueba utilizar metodo pluck, recoge todos los id asociados a el array servicios que tiene name de servicios
        $idsCollectionServiciosAsociados = $registros_servicios->pluck('id');
        echo "Array IDS de cada nombre de servicios: " .$idsCollectionServiciosAsociados;

        foreach ($idsCollectionServiciosAsociados as $idServicio){
            $register_service = new RegisterService();

            $register_service->register_id = $register->id;
            $register_service->service_id = $idServicio;

            $register_service->save();
        }

        return redirect()->back()->with('mensaje', 'La cita ha sido creada. Si hay algún cambio serás notificado vía email. Muchas gracias!');

    }
}
