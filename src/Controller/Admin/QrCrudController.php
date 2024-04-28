<?php

namespace App\Controller\Admin;

use App\Entity\Qr;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class QrCrudController extends AbstractCrudController
{
    public function __construct(
        private readonly UrlGeneratorInterface $urlGenerator,
    ) {
    }

    public static function getEntityFqcn(): string
    {
        return Qr::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->showEntityActionsInlined()
            ->overrideTemplates([
                'crud/detail' => 'admin/qr/detail.html.twig',
            ]);
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::DELETE)
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_INDEX, Action::new('show', 'Show', 'fa fa-qrcode')
                ->linkToUrl(function (Qr $qr) {
                    return $this->urlGenerator->generate('app_qr_show', ['id' => $qr->getId()]);
                })
            );
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
        yield UrlField::new('url');

        yield DateTimeField::new('createdAt')
          ->onlyOnIndex();
        yield DateTimeField::new('updatedAt')
          ->onlyOnIndex();
    }
}
