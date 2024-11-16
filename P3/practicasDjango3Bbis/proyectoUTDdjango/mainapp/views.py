from django.shortcuts import render, HttpResponse, redirect

# Create your views here.

def index(request):
    mensaje = 'hola soy un mensaje'
    return render(request, 'mainapp/index.html', {
        'title': 'Inicio',
        'content': '.:: Bienvenido a la pagina principal ::.',
        'mensaje': mensaje
    })

def about(request):
    return render(request, 'mainapp/about.html', {
        'title': 'Acerca de nosotros',
        'content': 'Somos un equipo de desarrollo de SW'
    })

def mision(request):
    return render(request, 'mainapp/mision.html', {
        'title': 'Mision',
        'content': 'La mision de la empresa'
    })

def vision(request):
    return render(request, 'mainapp/vision.html', {
        'title': 'Vision',
        'content': 'La vision de la empresa'
    })

def error_404_view(request, exception):
    return redirect('inicio')