<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\Appointment;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class AppointmentController  extends Controller
{
    use ApiResponser;
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return List of appointments
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        //
        $appointments = Appointment::all();
        
        return $this->successResponse($appointments);
      
    }

    /**
     * Create one new Schedule
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[

            'schedule_id'=>'required|integer',
            'user_id'=>'required|integer',
            'doctor_id'=>'required|integer',
            'notes'=>'string',
            'queue_number'=>'integer',
            'status'=>'string',


        ]);
       
        $appointments = Appointment::create($request->all());          
        return $this->successResponse($appointments,Response::HTTP_CREATED);
       
    }

    /**
     * get one appointment
     *
     * @return Illuminate\Http\Response
     */
    public function show($appointment)
    {
        //

        $appointment = Appointment::findOrFail($appointment);
        return $this->successResponse($appointment);
        
    }

    /**
     * update an existing one Schedule
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request,$appointment)
    {

        $this->validate($request,[

            'schedule_id'=>'integer',
            'user_id'=>'integer',
            'doctor_id'=>'integer',
            'notes'=>'string',
            'queue_number'=>'integer',
            'status'=>'string',
        ]);
        
        $appointment = Appointment::findOrFail($appointment);
        $appointment->fill($request->all());

        
        if($appointment->isClean()){
            return $this->errorResponse("you didn't change any value",Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $appointment->save();
        return $this->successResponse($appointment);
    }

     /**
     * remove an existing one renewal
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($appointment)
    {
        $appointment = Appointment::findOrFail($appointment);
        $appointment->delete();
        return $this->successResponse($appointment);
      
    }

}
