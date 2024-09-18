<?php
namespace App\Service\RefactoringJS\JSUIComponents\Contact;

use App\Entity\Contact;
use App\Service\ServiceTaxes;
use App\Service\ServiceMonnaie;
use Doctrine\ORM\EntityManager;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Controller\Admin\PreferenceCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Service\RefactoringJS\JSUIComponents\JSUIParametres\JSChamp;
use App\Service\RefactoringJS\JSUIComponents\JSUIParametres\JSPanelRenderer;
use App\Service\RefactoringJS\JSUIComponents\JSUIParametres\JSCssHtmlDecoration;

class ContactListeRenderer extends JSPanelRenderer
{
    public function __construct(
        private EntityManager $entityManager,
        private ServiceMonnaie $serviceMonnaie,
        private ServiceTaxes $serviceTaxes,
        private string $pageName,
        private $objetInstance,
        private $crud,
        private AdminUrlGenerator $adminUrlGenerator
    ) {
        parent::__construct(self::TYPE_LISTE, $pageName, $objetInstance, $crud, $adminUrlGenerator);
    }

    public function design()
    {
        //Nom
        $this->addChamp(
            (new JSChamp())
                ->createTexte("nom", PreferenceCrudController::PREF_PRO_CONTACT_NOM)
                ->setColumns(10)
                ->getChamp()
        );
        //Poste
        $this->addChamp(
            (new JSChamp())
                ->createTexte("poste", PreferenceCrudController::PREF_PRO_CONTACT_POSTE)
                ->setColumns(10)
                ->getChamp()
        );
        //Téléphone
        $this->addChamp(
            (new JSChamp())
                ->createTexte("telephone", PreferenceCrudController::PREF_PRO_CONTACT_TELEPHONE)
                ->setColumns(10)
                ->getChamp()
        );
        //Email
        $this->addChamp(
            (new JSChamp())
                ->createTexte("email", PreferenceCrudController::PREF_PRO_CONTACT_EMAIL)
                ->setColumns(10)
                ->getChamp()
        );
        //Piste
        $this->addChamp(
            (new JSChamp())
                ->createAssociation("piste", PreferenceCrudController::PREF_PRO_CONTACT_PISTE)
                ->setColumns(10)
                ->getChamp()
        );
        //Date de création
        $this->addChamp(
            (new JSChamp())
                ->createDate("updatedAt", PreferenceCrudController::PREF_PRO_CONTACT_DATE_DE_MODIFICATION)
                ->setColumns(10)
                ->setFormatValue(
                    function ($value, Contact $objet) {
                        /** @var JSCssHtmlDecoration */
                        $formatedHtml = (new JSCssHtmlDecoration("span", $value))
                            ->ajouterClasseCss($this->css_class_bage_ordinaire)
                            ->outputHtml();
                        return $formatedHtml;
                    }
                )
                ->getChamp()
        );
    }

    public function batchActions(?array $champs, ?string $type = null, ?string $pageName = null, $objetInstance = null, ?Crud $crud = null, ?AdminUrlGenerator $adminUrlGenerator = null): ?array
    {
        return $champs;
    }
}
