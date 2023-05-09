<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class AuthorizePostDeletion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $post = Post::findOrFail($request->route('id'));




        if (Auth::id() !== $post->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
