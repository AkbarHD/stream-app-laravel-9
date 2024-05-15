<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // utk MiddleWare
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user(); // ini knp bisa Auth::user? karena dpt dari session regenerate

        // ketika user session tdk ada brati dia blm login ke admin maka redirect ke login
        if ($user) { // jika ada (sudah login)
            return $next($request); // maka akan meneruskan loginnya dan berlalih ke dashboard member
        } else {
            // jika blm login
            return redirect()->route('admin.login');
        }
    }
}
