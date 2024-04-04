<div class="h-[250px] flex flex-col justify-center items-center">
  <h2 class="text-center text-3xl w-2/3">
    @lang(':jobCount vagas de :companyCount empresas.', [
        'jobCount' => $jobCount,
        'companyCount' => $companyCount,
    ])
  </h2>

  <h3 class="text-center mt-2 w-2/3">
    @lang('Descubra vagas das melhores empresas de E-sports do Brasil.')
  </h3>

  <x-subscribe :icon="false" />
</div>
