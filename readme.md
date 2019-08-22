<p align="center"><img src="https://www.netsetsoftware.com/images2/logonetset.png"></p>
<h1>PHP STANDARD CODE API+ADMIN PANEL</h1>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Project
Frame Work Used : Laravel
Version : 5.8
This a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel Framework takes the pain out of development by easing common tasks used in many web projects, such as:

<h1><a id="user-content-code-overview" class="anchor" aria-hidden="true" href="#code-overview"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Code overview</h1>
<h2><a id="user-content-dependencies" class="anchor" aria-hidden="true" href="#dependencies"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Dependencies</h2>
<ul>
<li><a href="https://laravel.com/docs/5.8/passport">Laravel Passport</a> - For authentication using tokens</li>
<li><a href="https://github.com/barryvdh/laravel-cors">laravel-cors</a> - For handling Cross-Origin Resource Sharing (CORS)</li>
</ul>
<h2><a id="user-content-folders" class="anchor" aria-hidden="true" href="#folders"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Folders</h2>
<ul>
<li><code>app</code> - Contains all the Eloquent models</li>
<li><code>app/Http/Controllers/Api</code> - Contains all the api controllers</li>
<li><code>app/Http/Middleware</code> - Contains the  auth middleware</li>

<li><code>app/standard_code/</code> - Contains the files implementing the favorite feature</li>
<li><code>config</code> - Contains all the application configuration files</li>
<li><code>database/factories</code> - Contains the model factory for all the models</li>
<li><code>database/migrations</code> - Contains all the database migrations</li>
<li><code>database/seeds</code> - Contains the database seeder</li>
<li><code>routes</code> - Contains all the api routes defined in api.php file</li>
<li><code>tests</code> - Contains all the application tests</li>
<li><code>tests/Feature/Api</code> - Contains all the api tests</li>
</ul>
<h2><a id="user-content-environment-variables" class="anchor" aria-hidden="true" href="#environment-variables"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Environment variables</h2>
<ul>
<li><code>.env</code> - Environment variables can be set in this file</li>
</ul>
<p><em><strong>Note</strong></em> : You can quickly set the database information and other variables in this file and have the application fully working.</p>
<hr>
<h1><a id="user-content-testing-api" class="anchor" aria-hidden="true" href="#testing-api"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Testing API</h1>
<p>Run the laravel development server</p>
<pre><code>php artisan serve
</code></pre>
<p>The api can now be accessed at</p>
<pre><code>http://localhost:8000/api
</code></pre>
<p>Request headers</p>
<table>
<thead>
<tr>
<th><strong>Required</strong></th>
<th><strong>Key</strong></th>
<th><strong>Value</strong></th>
</tr>
</thead>
<tbody>
<tr>
<td>Yes</td>
<td>Content-Type</td>
<td>application/json</td>
</tr>
<tr>
<td>Yes</td>
<td>X-Requested-With</td>
<td>XMLHttpRequest</td>
</tr>
<tr>
<td>Optional</td>
<td>Authorization</td>
<td>Token {JWT}</td>
</tr>
</tbody>
</table>
<p>Refer the <a href="#api-specification">api specification</a> for more info.</p>
<hr>
<h1><a id="user-content-authentication" class="anchor" aria-hidden="true" href="#authentication"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Authentication</h1>
<p>This applications uses Passport to handle authentication. The token is passed with each request using the <code>Authorization</code> header with <code>Bearer Token</code> scheme. </p>
