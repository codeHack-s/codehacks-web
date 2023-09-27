<?php

namespace App\Http\Middleware;

use App\Models\Payment;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPayment
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $course = $request->route('course'); // Assuming the route parameter for the course is 'course'
        $userId = $request->user()->id;

        $payment = Payment::where('user_id', $userId)
            ->where('course_id', $course->id)
            ->first();

        //if user_type is innovate allow
        $should_bypass = $request->user()->user_type === 'campus';

        if ($should_bypass) {
            return $next($request);
        }

        if (!$payment) {
            return redirect()->route('courses.show', $course->id)
                ->with('error', 'Payment required');
        }

        if ($payment->amount !== $course->price){
            return redirect()->route('courses.show', $course->id)
                ->with('error', 'Amount mismatch for this course');
        }

        return $next($request);
    }
}
