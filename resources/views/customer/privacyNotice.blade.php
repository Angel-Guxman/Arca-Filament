@extends('layouts.customer')
@section('content')

<style>
    .privacy-notice {
        color: #ffffff;
        padding: 20px;
        text-align: justify;
        line-height: 1.6;
    }

    .privacy-notice h1 {
        font-size: 2rem;
        text-align: center;
        margin-bottom: 20px;
    }

    @media (max-width: 1024px) {
        .privacy-notice {
            padding: 15px;
        }

        .privacy-notice h1 {
            font-size: 1.75rem;
        }
    }

    @media (max-width: 767px) {
        .privacy-notice {
            padding: 10px;
        }

        .privacy-notice h1 {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .privacy-notice {
            padding: 8px;
        }

        .privacy-notice h1 {
            font-size: 1.25rem;
        }
    }
</style>

<div class="privacy-notice">
    <h1>Aviso de Privacidad</h1>
    <p>Arca se compromete a proteger la privacidad de sus usuarios y clientes. Este aviso de privacidad explica cómo recopilamos, utilizamos y protegemos la información personal que obtenemos de usted.</p>
    <p><strong>Información que recopilamos:</strong></p>
    <ul>
        <li>Información de contacto, como su nombre, dirección de correo electrónico, número de teléfono y dirección postal.</li>
        <li>Información demográfica, como su edad, sexo, ocupación y preferencias.</li>
        <li>Información de pago, como detalles de tarjetas de crédito o débito, para procesar transacciones.</li>
        <li>Información de uso del sitio web, como direcciones IP, tipo de navegador, páginas visitadas y tiempo de visita.</li>
    </ul>
    <p><strong>Cómo utilizamos su información:</strong></p>
    <ul>
        <li>Para procesar sus pedidos y brindarle los servicios solicitados.</li>
        <li>Para mejorar nuestros productos y servicios.</li>
        <li>Para enviarle información sobre promociones, eventos o noticias relevantes para usted.</li>
        <li>Para personalizar su experiencia en nuestro sitio web.</li>
        <li>Para cumplir con requisitos legales y regulaciones aplicables.</li>
    </ul>
    <p><strong>Protección de su información:</strong></p>
    <ul>
        <li>Implementamos medidas de seguridad técnicas y organizativas para proteger su información contra accesos no autorizados, pérdida o alteración.</li>
        <li>Solo compartimos su información con terceros en la medida necesaria para cumplir con los propósitos descritos anteriormente o cuando esté legalmente permitido.</li>
    </ul>
    <p><strong>Sus derechos de privacidad:</strong></p>
    <ul>
        <li>Tiene derecho a acceder, corregir o eliminar su información personal.</li>
        <li>Puede optar por no recibir comunicaciones de marketing directo en cualquier momento.</li>
    </ul>
    <p><strong>Cambios en este aviso de privacidad:</strong></p>
    <p>Nos reservamos el derecho de actualizar este aviso de privacidad en cualquier momento. Se le notificará cualquier cambio significativo.</p>
    <p>Si tiene alguna pregunta o inquietud sobre nuestra política de privacidad, no dude en ponerse en contacto con nosotros a través de [información de contacto].</p>
    <p><strong>Arca</strong></p>
</div>

@endsection
