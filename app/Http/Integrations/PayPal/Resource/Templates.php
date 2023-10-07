<?php

namespace App\Http\Integrations\PayPal\Resource;

use App\Http\Integrations\PayPal\Requests\Templates\CreateTemplate;
use App\Http\Integrations\PayPal\Requests\Templates\DeleteTemplate;
use App\Http\Integrations\PayPal\Requests\Templates\FullyUpdateTemplate;
use App\Http\Integrations\PayPal\Requests\Templates\ListTemplates;
use App\Http\Integrations\PayPal\Requests\Templates\ShowTemplateDetails;
use App\Http\Integrations\PayPal\Resource;
use Saloon\Http\Response;

class Templates extends Resource
{
    /**
     * @param  string  $fields The fields to return in the response. Value is `all` or `none`. To return only the template name, ID, and default attributes, specify `none`.
     * @param  string  $page The page number to be retrieved, for the list of templates. So, a combination of `page=1` and `page_size=20` returns the first 20 templates. A combination of `page=2` and `page_size=20` returns the next 20 templates.
     * @param  string  $pageSize The maximum number of templates to return in the response.
     */
    public function listTemplates(?string $fields, ?string $page, ?string $pageSize): Response
    {
        return $this->connector->send(new ListTemplates($fields, $page, $pageSize));
    }

    public function createTemplate(
        mixed $name,
        mixed $defaultTemplate,
        mixed $templateInfo,
        mixed $settings,
        mixed $unitOfMeasure,
        mixed $standardTemplate,
    ): Response {
        return $this->connector->send(new CreateTemplate($name, $defaultTemplate, $templateInfo, $settings, $unitOfMeasure, $standardTemplate));
    }

    public function showTemplateDetails(string $templateId): Response
    {
        return $this->connector->send(new ShowTemplateDetails($templateId));
    }

    public function fullyUpdateTemplate(
        string $templateId,
        mixed $name,
        mixed $defaultTemplate,
        mixed $templateInfo,
        mixed $settings,
        mixed $unitOfMeasure,
        mixed $standardTemplate,
    ): Response {
        return $this->connector->send(new FullyUpdateTemplate($templateId, $name, $defaultTemplate, $templateInfo, $settings, $unitOfMeasure, $standardTemplate));
    }

    public function deleteTemplate(string $templateId): Response
    {
        return $this->connector->send(new DeleteTemplate($templateId));
    }
}
