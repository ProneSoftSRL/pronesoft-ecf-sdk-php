<?php

/**
 * Ejemplo de uso del wrapper EcfClient para el SDK de eCF de Pronesoft.
 *
 * Este script demuestra cómo inicializar el cliente único y llamar a las APIs
 * de negocio de forma transparente, sin preocuparse por la obtención o renovación de tokens.
 */

// 1. Importar el cargador automático de Composer
require_once __DIR__ . '/vendor/autoload.php';

use PronesoftEcfSdk\EcfClient;
use PronesoftEcfSdk\ApiException;

// 2. Configurar credenciales (ejemplo con Sandbox)
$host = 'https://api.ecf.sandbox.pronesoft.com/api/v1';
$clientId = 'SBX-TU-EMPRESA-UUID';
$clientSecret = 'tu-client-secret-aqui';
$tenantId = 'SBX-RNC-DE-LA-EMPRESA-ACTIVA'; // Identificador de la empresa activa (cabecera x-tenant-id)

try {
    echo "Inicializando EcfClient y autenticando automáticamente...\n";
    
    // Instanciar el wrapper con el tenantId opcional (establece la empresa activa/sesión).
    // Esto realizará de forma automática la petición HTTP para obtener el primer token.
    $client = new EcfClient($host, $clientId, $clientSecret, $tenantId);
    
    echo "¡Autenticación completada con éxito!\n\n";

    // ---------------------------------------------------------
    // Caso 1: Obtener secuencias fiscales
    // ---------------------------------------------------------
    echo "Obteniendo secuencias fiscales:\n";
    $taxSequencesApi = $client->taxSequences();
    
    // Realizar llamada de negocio
    // Nota: Reemplaza con datos válidos según los parámetros de tu API.
    // $secuencias = $taxSequencesApi->listTaxSequences();
    // var_dump($secuencias);
    echo "-> Servicio de secuencias obtenido listo para usar.\n\n";

    // ---------------------------------------------------------
    // Caso 2: Consultar documentos enviados
    // ---------------------------------------------------------
    echo "Consultando documentos enviados:\n";
    $documentsSentApi = $client->documentsSent();
    
    // $documentos = $documentsSentApi->listSentDocuments();
    // var_dump($documentos);
    echo "-> Servicio de documentos enviados obtenido listo para usar.\n\n";

    // ---------------------------------------------------------
    // Caso 3: Delegación multi-empresa (Actuar en nombre de una sucursal)
    // ---------------------------------------------------------
    echo "Delegando peticiones a una sucursal (empresa asociada):\n";
    $sucursalUuid = 'uuid-de-tu-sucursal-asociada';
    
    // El método forTenant devuelve una nueva instancia del cliente
    // que inyecta automáticamente la cabecera 'x-tenant-id' en cada petición.
    $tenantClient = $client->forTenant($sucursalUuid);
    
    // Las llamadas con este cliente se harán en nombre de la sucursal
    $sucursalDocsApi = $tenantClient->documentsSent();
    echo "-> Cliente delegado para la sucursal '{$sucursalUuid}' listo para usar.\n\n";

} catch (ApiException $e) {
    // Captura de errores específicos retornados por la API
    echo "Error retornado por la API de eCF:\n";
    echo "Código de estado: " . $e->getCode() . "\n";
    echo "Respuesta del servidor: " . $e->getResponseBody() . "\n";
} catch (\Exception $e) {
    // Captura de cualquier otro error general (red, configuración, etc.)
    echo "Error general: " . $e->getMessage() . "\n";
}
