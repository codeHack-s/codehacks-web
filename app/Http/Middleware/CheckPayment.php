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
        $courseId = $request->route('course')->id; // Assuming the route parameter for the course is 'course'
        $userId = $request->user()->id;

        // Check if a valid payment exists for the given course and user
        $paymentExists = Payment::where('user_id', $userId)
            ->where('course_id', $courseId)
            ->exists();

        if (!$paymentExists) {
            return redirect()->route('courses.show', $courseId)
                ->with('error', 'Payment required to access this course.');
        }

        return $next($request);
    }
}
